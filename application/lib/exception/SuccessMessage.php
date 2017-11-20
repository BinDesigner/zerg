<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/20
 * Time: 11:56
 */

namespace app\lib\exception;


class SuccessMessage extends BaseExcption
{
    public $code = 201;
    public $msg = 'ok';
    public $errorCode = 0;
}