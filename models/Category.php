<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 17.08.2017
 * Time: 12:36
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{

    public static function tableName(){
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }



}