<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши баннера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'img:image',
            'link:ntext',
            [
                'attribute' => 'position',
                'content' => function ($data) {
                   return $data->getPosition($data->position);
                },
            ],
            'datetime_end:date',
            [
                'attribute' => 'views',
                'value' => function ($data) {
                   return round($data->views * $data->rate);
                },
            ],
            [
                'attribute' => 'click',
                'value' => function ($data) {
                   return round($data->click * $data->rate);
                },
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                   return ($data->status == 1)?  "Активно" :  "Не активно";
                },
            ],
            [
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(
                        'Подробнее',
                        [
                            'banner/view',
                            'id' => $data->id,
                        ],
                        [
                            'target' => '_blank',
                            'class' => 'btn btn-success'
                        ]
                    );
                }
            ],
        ],
    ]); ?>
</div>