<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/account.css');
?>
<div class="account-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="account-text">
        <p>
            This is the Account page. You may modify the following file to customize its content:
        </p>
    </div>

    <div class="user-details">
    <h3>Информация о пользователе</h3>
    <div class="user-avatar">
        <!-- ава -->
    </div>
    <p>
        <span class="email-icon">&#9993;</span> <?= strtolower(Html::encode($user->username)) ?>
    </p>

    <div class="create-news-form">
    
</div>
