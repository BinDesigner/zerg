<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 17:49
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChartException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    //构造函数用来初始化
    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID =config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),
            $this->wxAppID,$this->wxAppSecret,$this->code);
    }

    //用完整wxUrl去访问，获得sessionkey和openid
    public function get(){
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }
        else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this -> processLoginError($wxResult);
            }
            else{
                return $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        //拿到openid
        //数据库看一下，这个openid是不是已经存在
        //如果存在，不出来；如果不存在，就新增一条user记录
        //准备缓存数据，写入缓存
        //把令牌返回到客户端
        //key:令牌
        //value:wxResult，uid，scope
        $openid = $wxResult['openid'];
        $user =UserModel::getByOpenID($openid);
        if($user){
            $uid = $user->id;
        }
        else
        {
            $uid= $this->newUser($openid);
        }
        $cacheValue = $this->prepareCacheValue($wxResult,$uid);
        $token = $this->saveToCache($cacheValue);
        return $token;
    }

    //缓存
    private function saveToCache($cacheValue1){
        $key = self::generateToken();
        $value = json_encode($cacheValue1);
        $expire_in = config('setting.token_expire_in');

        //tp5缓存方法
        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

    private function prepareCacheValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = ScopeEnum::User ;
        return $cachedValue;
    }

    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
    }

    private function processLoginError($wxResult)
    {
        throw new WeChartException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}