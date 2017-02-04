<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = 'Баннер';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$UnixTime_reg = $model->UnixTime($model->datetime_reg);
$UnixTime_end = $model->UnixTime($model->datetime_end);
$total = 100 - round((($UnixTime_end - time())*100)/($UnixTime_end-$UnixTime_reg));
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
    <div class="progress">
    <?= Html::tag('div', Html::encode($total), ['role' => 'progressbar','aria-valuenow' => '$total','aria-valuemax' => '100', 'class' => 'progress-bar']) ?>
      <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
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

