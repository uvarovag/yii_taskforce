<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'id' => 'search_tasks_id',
        'method' => 'get',
        'action' => "#",
        'options' => ['class' => 'search-task__form'],
        'fieldConfig' => [
            'labelOptions' => ['class' => 'checkbox__legend'],
            'options' => ['tag' => false]
        ]
    ]); ?>

    <fieldset class="search-task__categories">
        <legend>Категории</legend>
        <?= $form->field($model, 'id', ['template' => '{input}'])
            ->checkboxList(Category::find()->select(['name', 'id'])->indexBy('id')->column(), [
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked = $checked ? 'checked' : '';
                    return "
                    <label class='checkbox__legend' for='{$index}'>
                        <input class=\"checkbox__input\" id='{$index}' type='checkbox' name='{$name}' value='{$value}' $checked >
                        <span>{$label}</span>
                    </label>";
                }])->label(false);
        ?>
    </fieldset>

    <fieldset class="search-task__categories">
        <legend>Дополнительно</legend>
<!--        --><?//= $form->field($model, 'free')->checkbox([
//            'class' => 'checkbox__input',
//            'label' => '<span>Сейчас свободен</span>',
//            'labelOptions' => ['class' => 'checkbox__legend']
//        ]); ?>
<!--        --><?//= $form->field($model, 'online')->checkbox([
//            'class' => 'checkbox__input',
//            'label' => '<span>Сейчас онлайн</span>',
//            'labelOptions' => ['class' => 'checkbox__legend']
//        ]); ?>
<!--        --><?//= $form->field($model, 'reviews')->checkbox([
//            'class' => 'checkbox__input',
//            'label' => '<span>Есть отзывы</span>',
//            'labelOptions' => ['class' => 'checkbox__legend']
//        ]); ?>
<!--        --><?//= $form->field($model, 'favorites')->checkbox([
//            'class' => 'checkbox__input',
//            'label' => '<span>В избранном</span>',
//            'labelOptions' => ['class' => 'checkbox__legend']
//        ]); ?>
    </fieldset>

    <label class="search-task__name">Поиск по имени</label>
<!--    --><?//= $form->field($model, 'search')->textInput([
//        'class' => "input-middle input",
//        'type' => 'search'])
//        ->label(false); ?>

    <fieldset class="search-task__categories">
        <legend>Дополнительно</legend>
        <input class="visually-hidden checkbox__input" id="106" type="checkbox" name="" value="" disabled>
        <label for="106">Сейчас свободен</label>
        <input class="visually-hidden checkbox__input" id="107" type="checkbox" name="" value="" checked>
        <label for="107">Сейчас онлайн</label>
        <input class="visually-hidden checkbox__input" id="108" type="checkbox" name="" value="" checked>
        <label for="108">Есть отзывы</label>
        <input class="visually-hidden checkbox__input" id="109" type="checkbox" name="" value="" checked>
        <label for="109">В избранном</label>
    </fieldset>

    <?= Html::submitButton('Искать', ['class' => 'button']) ?>

    <?php ActiveForm::end(); ?>

</div>
