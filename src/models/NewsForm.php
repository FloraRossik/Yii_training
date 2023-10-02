<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class NewsForm extends Model
{
    public $heading;
    public $description;
    public $author;
    public $image;

    private $_news;

    public function rules()
    {
        return [
            [['heading', 'description'], 'required'],
            ['heading', 'string', 'max' => 500],
            ['description', 'string', 'max' => 10000],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function createNews()
    {
        $this->image = UploadedFile::getInstance($this, 'image');

        if ($this->validate()) {

            $this->_news = new News();
            $this->_news->heading = $this->heading;
            $this->_news->description = $this->description;
            if (!empty($this->image)) {
                $path = '/uploads/images/' . Yii::$app->security->generateRandomString(12) . '.' . $this->image->extension;
                try {
                    if ($this->image->saveAs('../web' . $path))
                        $this->_news->image = $path;
                } catch (\Exception) {
                    $this->_news->image = '/uploads/images/default-image.jpg';
                }
            } else {
                $this->_news->image = '/uploads/images/default-image.jpg';
            }
            $currentUser = Yii::$app->user->identity;
            $this->_news->author = $currentUser->id;

            return $this->_news->save();
        }

        return false;
    }

    public function updateNews($news)
    {
        if ($this->validate()) {

           $news->heading = $this->heading;
           $news->description = $this->description;

            return $news->save();
        }

        return false;
    }
}