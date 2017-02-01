<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Banner;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Админка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать баннер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
            [
                'attribute' => 'user_to',
                'content' => function ($data) {
                   return $data->getUser_to($data->user_to);
                },
            ],
            'datetime_end:date',
            'views',
            'click',
            'rate',
            [
                'attribute' => 'status',
                'content' => function ($data) {
                   return $data->getStatus($data->status);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
