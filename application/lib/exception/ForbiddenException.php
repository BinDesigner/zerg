<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 14:20
 */

namespace app\lib\exception;


class ForbiddenException extends BaseExcption
{
    public $code = 403;
    public $msg = "权限不够";
    public $errorCode = 10001;
}