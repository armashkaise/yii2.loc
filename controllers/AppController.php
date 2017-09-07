<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 18.08.2017
 * Time: 10:59
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use Yii;

class AppController extends Controller
{

    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

    }

}