<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Weather $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Weathers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="weather-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
            if (\Yii::$app->user->can('createWeatherRecord')) {
                echo Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
            }   
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city',
            'temperature',
            'air_humidity',
            'wind',
            'precipitation',
        ],
    ]) ?>

</div>
