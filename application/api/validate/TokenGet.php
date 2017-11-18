<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 17:31
 */

namespace app\api\validate;


use app\api\validate\BaseValidate;

class TokenGet extends BaseValidate
{
    protected  $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code还想Token'
    ];
}