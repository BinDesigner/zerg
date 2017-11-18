<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 10:43
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        //tp5限制传入范围的
        'count' => 'isPositiveInteger|between:1,15'
    ];
}