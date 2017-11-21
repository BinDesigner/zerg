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
    protected  function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected  function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}

