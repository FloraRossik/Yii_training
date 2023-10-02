<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\News;
use app\models\User;
use app\models\NewsForm;
use yii\data\Pagination;

class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'show'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createNews'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updateNews'],
                        'roleParams' => function() {
                            return ['author' => News::findOne(['id' => Yii::$app->request->get('id')])->author];
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['deleteNews'],
                        'roleParams' => function() {
                            return ['author' => News::findOne(['id' => Yii::$app->request->get('id')])->author];
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $news = News::find()->asArray()->all();

        $query = News::find()
            ->joinWith('author')
            ->orderBy(['news.created_at' => SORT_DESC]);
        
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'   => 5 
        ]);
        
        $news = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();

        return $this->render('/news/index', [
            'news' => $news,
            'pagination' => $pagination,
        ]);
    }

    public function actionShow($id)
    {
        $post = News::findOne($id);
        $author = User::findOne($post->getAttribute('author'))->getAttribute('username');

        return $this->render('/news/show', [
            'news' => $post,
            'author' => $author,
        ]);
    }

    public function actionCreate()
    {   
        $form = new NewsForm();
        
        if ($form->load(Yii::$app->request->post()) && $form->createNews()) {
            return $this->redirect(['/news/index']);
        } else {
            return $this->render('/news/create', [
                'newsForm' => $form
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = News::findOne($id);
        $form = new NewsForm();

        $currentUser = Yii::$app->user->identity;

        if ($form->load(Yii::$app->request->post()) && $form->updateNews($model)) {
            return $this->redirect(['/news/index']);
        }
       
        return $this->render('/news/update', [
            'newsForm' => $form,
            'news' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $news = News::findOne($id);

        if ($news->image && $news->image != "/uploads/images/default-image.jpg") {
            try {
                unlink(Yii::$app->basePath . '/web/' . $news->image);
            } catch ( yii\base\ErrorException ) {}
            
        }

        $news->delete();

        return $this->redirect(['/news/index']);
    }
}