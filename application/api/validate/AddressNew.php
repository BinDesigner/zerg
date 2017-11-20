<?php
/**
 * Created by PhpStorm.
 * User: Machenike
 * Date: 2017/11/20
 * Time: 0:12
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule = [
        'name' =>'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
        //'uid' => 'require|isNotEmpty',
    ];
}