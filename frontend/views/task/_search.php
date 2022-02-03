<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'expire') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'budget') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'long') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'employer_id') ?>

    <?php // echo $form->field($model, 'executor_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
