<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 17:03
 */

namespace app\lib\exception;


class ParameterException extends BaseExcption
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}