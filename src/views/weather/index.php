<?php

use app\models\Weather;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Weathers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weather-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
           if (\Yii::$app->user->can('createWeatherRecord')) {
               echo Html::a('Create Weather record', ['create'], ['class' => 'btn btn-success']);
           }
        ?>
    </p>
    <p>
        <?php 
           if (\Yii::$app->user->can('updateWeatherRecord')) {
            echo Html::a('Update All Weather records', ['update'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'city',
            'temperature',
            'air_humidity',
            'wind',
            'precipitation',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Weather $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
