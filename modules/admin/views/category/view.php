<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
        <h1>Просмотр категории: <?= $model->name ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'parent_id',
        [
            'attribute' => 'parent_id',
            'value' => !$model->parent_id ? 'Самостоятельная категория' : $model->category->name
        ],
            'name',
            'keywords',
            'description',
        ],
    ]) ?>

</div>
