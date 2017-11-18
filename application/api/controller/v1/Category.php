<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 14:10
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\api\validate\CategoryExcption;

class Category
{

    public function getAllCategories(){

         $categories = CategoryModel::with('img')->select();
        //$categories = CategoryModel::all([],'img');
        if($categories -> isEmpty()){
            throw new CategoryExcption();
        }
        return $categories;
    }
}