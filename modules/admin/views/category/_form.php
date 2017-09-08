<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'parent_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group  field-category-parent_id has-success">
        <label class="control-label" for="category-parent-id">Родительская категория</label>
        <select id="category-parent-id" class="form-control" name="Category[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
