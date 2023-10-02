<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-register">
<h1><?= Html::encode($this->title) ?></h1>

<p>Please fill out the following fields to register:</p>

<div class="row">
    <div class="col-lg-5">

    <?php $form = ActiveForm::begin(['id' => 'register-form', 'action' => ['register']]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'confirm_password')->passwordInput() ?>

        <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

     </div>
    </div>
</div>