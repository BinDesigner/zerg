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
    protected  $products = [
        [
            'product_id' => 1,
            'count'=>3
        ],
        [
            'product_id' => 2,
            'count'=>3
        ],
        [
            'product_id' => 3,
            'count'=>3
        ]
    ];

    protected  $rule = [
        'products' => 'checkProducts'
    ];

    protected $singleRule = [
        'products' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($values){
        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }

        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '商品参数不正确'
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
    }
}