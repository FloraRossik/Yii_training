<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\User;
use Yii;

class News extends ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
}