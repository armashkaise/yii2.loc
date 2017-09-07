<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 18.08.2017
 * Time: 10:56
 */

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex(){
        $this->setMeta('E-SHOPPER');
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
//        $id = \Yii::$app->request->get('id');
//        $products = Product::find()->where(['category_id' => $id])->all();

        $category = Category::findOne($id);
        if (empty($category)) throw new \yii\web\HttpException(404, 'The requested Item could not be found.');

        //подключение пагинации
        $query = Product::find()->where(['category_id' => $id]);
//        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch(){
        $q = trim(\Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | ' . $q);
        if (!empty($q)){ //Строка запроса не пуста
            $query = Product::find()->where(['like', 'name', $q]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
                'forcePageParam' => false, 'pageSizeParam' => false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('search', compact('products', 'pages', 'q'));
        } else {
            return $this->render('search');
        }



    }
}