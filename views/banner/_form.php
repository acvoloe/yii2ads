<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'position')->dropDownList([
        'Шапка(Сквозная)' => [
            '0' => 'Левый',
            '1' => 'Центральный',
            '2' => 'Правый',
        ],
        'Слева от картинки дня' => [
            '3' => 'Верхний',
            '4' => 'Центральный',
            '5' => 'Нижний',
        ],
        'Центр главный' => [
            '6' => 'Левый верхний',
            '7' => 'Правый верхний',
            '8' => 'Левый нижний',
            '9' => 'Правый нижний',
        ],
        'Подвал(Сквозная)' => [
            '10' => 'Левый',
            '11' => 'Правый',
        ],
        'Правая колонка(Сквозная)' => [
            '12' => 'Верхний',
            '13' => 'Центральный',
            '14' => 'Нижний',
        ],
        'Не главная' => [
            '15' => 'Левый',
            '16' => 'Правый',
        ],
    ]) ?>

    <?= $form->field($model, 'user_to')->dropDownList(ArrayHelper::map(User::find()->All(), 'id' ,'username')) ?>

    <?= $form->field($model, 'datetime_reg')->widget(DatePicker::classname(),['dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'datetime_end')->widget(DatePicker::classname(),['dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'click')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Неактивно', 'Активный']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
