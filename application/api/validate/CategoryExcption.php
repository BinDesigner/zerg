<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 14:36
 */

namespace app\api\validate;


use app\lib\exception\BaseExcption;

class CategoryExcption extends BaseExcption
{
    public  $code = 404;
    public $msg = '指定类目不存在，请检查参数';
    public  $errorCode = 50000;
}