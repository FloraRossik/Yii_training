<?php

/** @var yii\web\View $this */
/** @var array $newsList */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Show';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/show.css');
?>
    <div class="news-list conatiner">

        <div class="news-item">
            <div class="row">
                <img src="<?= $news->image ?>" class="img-fluid" alt="Responsive image">
            </div>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="h2"><?= Html::encode($news->heading) ?></div>
                </div>
                <div class="col-md-5 offset-md-1">
                     <p><?= Html::encode($author) ?></p>
                </div>
                <div class="col-md-5">
                     <p> <?= Html::encode($news->created_at) ?></p>
                </div>
                <div class="col-md-10 offset-md-1">
                     <p><?= Html::encode($news->description) ?></p>
                </div>
            </div>
        </div>

        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
</div>