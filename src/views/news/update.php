<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/update.css');
?>
<div class="news-update">

    <h3>Edit</h3>
    <?php $form = ActiveForm::begin(['id' => 'news-create-form', 'action' => ['update' , 'id' => $news->id]]); ?>
            
        <?= $form->field($newsForm, 'heading')->textInput(['value' => $news->heading]) ?>

        <?= $form->field($newsForm, 'description')->textInput(['value' => $news->heading]) ?>

        <?= Html::submitButton('save', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>