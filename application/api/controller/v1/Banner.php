<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/7
 * Time: 11:00
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissExcption;
use think\Exception;

//use app\api\validate\TestValidate;
//use think\Validate;

class Banner
{
//    public function getBanner($id)
//    {
////        $data = [
////            'name' => 'vendor',
////            'email' => 'vendorqq.com'
////        ];
//        $data = [
//          'id' => $id
//        ];
//
////        $validate = new Validate([
////            'name' => 'require|max:10',
////            'email' => 'email'
////        ]);
////       $validate = new TestValidate();
//
//        $validate = new IDMustBePostiveInt();
//
//
//        $result = $validate->batch()->check($data);
////        var_dump($validate->getError());
//        if($result){
//
//        }
//        else{
//
//        }
//    }

    public function  getBanner($id)
    {
        (new IDMustBePostiveInt()) -> goCheck();
//        try
//        {
//            $banner = BannerModel::getBannerByID($id);
//        }
//        catch (Exception $ex)
//        {
//            $err = [
//                'error_code' => 10001,
//                'msg' => $ex-> getMessage()
//            ];
//            return json($err,400);
//        }
        $banner = BannerModel::getBannerByID($id);

       // $data = $banner->toArray();
       // unset($data['delete_time']);

        //$banner->hidden(['update_time']);
       // $banner->visible(['id','update_time']);

       //     实例化对象的调用
       //     $banner = new BannerModel();
       //     $banner = $banner->get($id);


        //     静态的调用
       // $banner = BannerModel::with(['items','items.img'])->find($id);
        //get find   只能返回一条记录
        //all select 返回一组记录
        //get all是模型的方法，  find select是Db的方法 ，  但是模型也可以用Db的，因为模型也是Db封装

        if(!$banner){
            // log('error')
             throw new BannerMissExcption();
          //  throw new Exception('内部错误');
        }
        $c = config('setting.img_prefix');
        return $banner;
    }



}