<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/create.css');
?>
<div class="news-create">

    <h3>Create a news item</h3>
    <?php $form = ActiveForm::begin(['id' => 'news-create-form', 'action' => ['create'], 'options' => ['enctype' => 'multipart/form-data']]); ?>
            
    <?= $form->field($newsForm, 'image')->fileInput() ?>

    <?= $form->field($newsForm, 'heading')->textInput(['autofocus' => true]) ?>

    <?= $form->field($newsForm, 'description')->textarea(['rows' => '6']) ?>

    <?= Html::submitButton('create', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

</div>