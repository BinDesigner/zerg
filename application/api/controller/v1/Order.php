<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/21
 * Time: 15:15
 */

namespace app\api\controller\v1;


use think\Controller;

class Order extends Controller
{
    // 用户选择商品后，提交包含他所选择的商品的相关信息
    // API在接收到信息后，需要检查订单相关商品的库存量
}