<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 22.08.2017
 * Time: 9:26
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;

class ProductController extends AppController
{
    public function actionView($id){
//        $id = \Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) throw new \yii\web\HttpException(404, 'The requested Item could not be found.');

        $hits = Product::find()->where(['hit' => '1'])->all();

        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }
}