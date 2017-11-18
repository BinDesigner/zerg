<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //
    //读取器
   // public  function  getUrlAttr($value,$date){
    protected  function  prefixImgUrl($value,$date){
        $finalUrl = $value;
        if($date['from'] == 1)
        {
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}
