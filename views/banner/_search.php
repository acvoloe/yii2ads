<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BannerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'user_to') ?>

    <?php // echo $form->field($model, 'datetime_reg') ?>

    <?php // echo $form->field($model, 'datetime_end') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'click') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
