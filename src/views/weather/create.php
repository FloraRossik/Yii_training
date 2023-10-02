<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Weather $model */

$this->title = 'Create Weather';
$this->params['breadcrumbs'][] = ['label' => 'Weathers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weather-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
