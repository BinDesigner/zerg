<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 11:39
 */

namespace app\lib\exception;


class UserException extends BaseExcption
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}