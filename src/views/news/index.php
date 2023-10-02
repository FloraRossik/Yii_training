<?php

/** @var yii\web\View $this */
/** @var array $newsList */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/index.css');
$this->registerCssFile('@web/css/edit.css');
$this->registerCssFile('@web/css/delete.css');
?>
<div class="news-index">
    <div class="add-news">
        <?php
            if (\Yii::$app->user->can('createNews')) {
                echo Html::a('+', Url::to(['create']), ['class' => 'btn btn-add-news']);
            }
            ?>
        </div>
    
        <div style="margin-bottom: 20px;">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    
    <?php foreach ($news as $post): ?>
        <div class="news-item">
            <?php if (\Yii::$app->user->can('updateNews', ['author' => $post['author']['id']])) {
                echo Html::a('<i class="fa fa-edit"></i>', Url::to(['update', 'id' => $post['id']]), ['class' => 'edit-link']);
            } ?>
        <?= "\n" ?>
        <?= Html::a('<i class="fa fa-trash"></i>', Url::to(['delete', 'id' => $post['id']]), ['class' => 'delete-link', 'style' => (\Yii::$app->user->can('deleteNews', ['author' => $post['author']['id']])) ? '' : 'display:none;']) ?>
            <h2><?= Html::encode($post['heading']) ?></h2>
            <div class="news-author">
                <p>Author: <?= Html::encode($post['author']['username']) ?></p>
            </div>
            <div class="read-more">
                <?= Html::a('Read more', Url::to(['show', 'id' => $post['id']])) ?>
            </div>
            <div style="text-align: right; color: black; font-size: 12px;">
                <?= Html::encode($post['created_at']) ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?= LinkPager::widget([
        'pagination' => $pagination,
    ]) ?>
</div>
