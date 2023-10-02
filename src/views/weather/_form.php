<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\WeatherFrom $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="weather-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->dropDownList($model->getOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
