<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 18:08
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
     //客户传来的数据
//    protected  $oProducts = [
//        [
//            'product_id' => 1,
//            'count'=>3
//        ],
//        [
//            'product_id' => 2,
//            'count'=>3
//        ],
//        [
//            'product_id' => 3,
//            'count'=>3
//        ]
//    ];
//    // 数据库的数据
//    protected  $Products = [
//        [
//            'product_id' => 1,
//            'count'=>3
//        ],
//        [
//            'product_id' => 2,
//            'count'=>3
//        ],
//        [
//            'product_id' => 3,
//            'count'=>3
//        ]
//    ];

    protected  $rule = [
        //定义自定义的验证器
        'products' => 'checkProducts'
    ];

    protected $singleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($values){
        //再判断要为数组
        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '商品参数不正确'
            ]);
        }

        //先判断不能为空
        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }


        foreach ($values as $value)
        {
            $this->checkProduct($value);
        }
        return true;
    }

    protected function checkProduct($value)
    {
        $validate = new BaseValidate($this->singleRule);
        $result=$validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误',
            ]);
        }
    }
}