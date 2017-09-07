<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 17.08.2017
 * Time: 12:36
 */

namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{

    public static function tableName(){
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



}