<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 15:53
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];
}