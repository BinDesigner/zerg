<?php
/**
 * Created by PhpStorm.
 * User: Machenike
 * Date: 2017/11/20
 * Time: 0:08
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{
    public function createOrUpdateAddress()
    {
        //(new AddressNew())->goCheck();
        $validate = new AddressNew();
        $validate->goCheck();

        //根据Token来获取uid
        //根据uid来查找用户数据，判断用户是否存在，如果不存在抛出异常
        //获取用户从客户端提交来的地址信息
        //根据用户地址信息是否存在，从而判断是添加地址还是更新地址

        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }

        $dataArray = $validate->getDataByRule(input('post.'));

        $userAddress = $user->address;
        if(!$userAddress)
        {
            //新增
            $user->address()->save($dataArray);
        }
        else{
            //更新
            $user->address->save($dataArray);
        }
        //把最新模型返回到客户端
        //return $user;

        //但是一般客户端不需要，只需要一个信息
        return json(new SuccessMessage(),201);
    }
}