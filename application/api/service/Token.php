<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/16
 * Time: 19:22
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Exception;
use think\Request;
use think\Cache;

class Token
{
    public static function generateToken(){
        //32个字符组成一组随机字符串
        $randChars = getRandChar(32);
        //用三组字符串，进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = config('secure.token_salt');


        return md5($randChars.$timestamp.$salt);
    }

    public static function getCurrentTokenVar($key){
        //约定在http head里面拿到token
        $token = Request::instance()
                 ->header('token');
        $vars = Cache::get($token);
        //判断缓存是否失效或有问题
        if(!$vars){
            throw new TokenException();
        }
        else{
            if(!is_array($vars))
            {
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key, $vars)) {
                return $vars[$key];
            }
            else{
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    public static function getCurrentUid(){
        //token
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}