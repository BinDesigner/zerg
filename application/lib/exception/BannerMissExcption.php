<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/8
 * Time: 14:49
 */

namespace app\lib\exception;


class BannerMissExcption extends BaseExcption
{
    public $code = 404;
    public $msg = "banner不存在";
    public $errorCode = 40000;
}