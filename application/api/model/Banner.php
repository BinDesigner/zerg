<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/8
 * Time: 10:18
 */

namespace app\api\model;


class Banner extends BaseModel
{
    //隐藏id
    protected $hidden=['update_time','delete_time'];

    //TP5默认类名就是数据库表名，想改变可以传一个table，更换默认值
    //protected $table = 'category';

    //关联模型
    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        $banner = self::with(['items','items.img'])
            ->find($id);
        return $banner;
        //TODO:根据bannerid获取
//        try
//        {
//            1/0;
//        }
//        catch (Exception $ex)
//        {
//            todo:可以记录日志
//            throw $ex;
//        }
//        return 'this is bannerInfo';
      //  return null;

        //数据库查询
        //原生sql查询
       //$rusult = Db::query('select * from banner_item where banner_id=?',[$id]);

        //查询构建器 update  delete   insert  find  select

        //表达式法
        //$rusult = Db::table('banner_item')->where('banner_id','=',$id)->select();

        //闭包法
//        $rusult = Db::table('banner_item')
//        //    ->fetchSql()  //不执行查询，而是返回一个sql语句
//            ->where(function ($query) use($id){
//                $query->where('banner_id','=',$id);
//            })
//            ->select();
//        return $rusult;
    }
}