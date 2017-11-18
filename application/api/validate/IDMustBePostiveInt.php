<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/7
 * Time: 15:57
 */
namespace app\api\validate;
//use think\Validate;
//use app\api\validate\BaseValidate;

class IDMustBePostiveInt extends BaseValidate
{
    protected  $rule = [
        'id'=>'require|isPositiveInteger',
      //  'num'=>'in:1,2,3'
    ];

    protected  $message = [
        'id' => '必须是整数'
    ];

}