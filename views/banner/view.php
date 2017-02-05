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
if ($total > 100) $total=100;
$model->datetime_reg = $model->Date($model->datetime_reg);
$model->datetime_end = $model->Date($model->datetime_end);
$CTR = round(($model->click / $model->views )* 100);
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
    
    <div class="row">
        <div class="col-md-5">
            <?= Html::tag('p', Html::img($model->img, ['width' => '100%']), ['class' => 'img']) ?>
        </div>
        <div class="col-md-5">
            <?= Html::tag('p', Html::encode($model->link)) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Срок действия с <?= Html::encode($model->datetime_reg)?> по <?= Html::encode($model->datetime_end)?> </p>
            <div class="progress">
                <?= Html::tag('div', Html::encode($total . '%'), ['role' => 'progressbar','aria-valuemin' => '0', 'aria-valuenow' => $total,'aria-valuemax' => '100','style' => 'width:'. $total .'%', 'class' => 'progress-bar']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    // 'img:image',
                    // 'link:ntext',
                    // 'position',
                    // 'user_to',
                    // 'datetime_reg:timestamp',
                    // 'datetime_end:timestamp',
                    'views',
                    'click',
                    [
                        'label' => 'CTR',
                        'format' => 'text',
                        'value' => $CTR . '%',
                    ],
                    //'rate',
                    //'status',
                ],
            ]) ?>
        </div>
    </div>

</div>

