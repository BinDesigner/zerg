<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 17:26
 */

namespace app\api\controller;

use app\api\service\Token as TokenService;
use think\Controller;


class BaseController extends Controller
{
    //tp5的前置方法
    // 用户和CMS管理员都可以访问的权限
    protected  function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    // 只有用户才能访问的接口权限
    protected  function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}

