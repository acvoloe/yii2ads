<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = 'Баннер';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$timestamp_all = Yii::$app->formatter->asDate($model->datetime_end, 'php:U') - Yii::$app->formatter->asDate($model->datetime_reg, 'php:U');
$timestamp_all_day = $timestamp_all / 86400;
?>
<div class="banner-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->identity->status == 20):?>
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
    <?php endif ?>
    <?= Html::tag('p', Html::img($model->img), ['class' => 'img']) ?>
    <?= Html::tag('p', Html::encode($model->datetime_reg), ['class' => 'img']) ?>
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
        <?= Html::tag('span', Html::encode($model->datetime_end), ['class' => 'sr-only']) ?>
      </div>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'img:image',
            'link:ntext',
            'position',
            //'user_to',
            'datetime_reg:timestamp',
            'datetime_end:timestamp',
            'views',
            'click',
            //'rate',
            'status',
        ],
    ]) ?>

</div>

