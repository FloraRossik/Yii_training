<?php

use yii\db\Migration;

/**
 * Class m230911_133829_init_rbac
 */
class m230911_133829_init_rbac extends Migration
{
  
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "createNews" permission
        $createNews = $auth->createPermission('createNews');
        $createNews->description = 'Create a News article';
        $auth->add($createNews);

        // add "updateNews" permission
        $updateNews = $auth->createPermission('updateNews');
        $updateNews->description = 'Update a News article';
        $auth->add($updateNews);

        // add "deleteNews" permission
        $deleteNews = $auth->createPermission('deleteNews');
        $deleteNews->description = 'Delete a News article';
        $auth->add($deleteNews);

        // add "changeNewsStatus" permission
        $updateNewsStatus = $auth->createPermission('updateNewsStatus');
        $updateNewsStatus->description = 'Update the status of an article';
        $auth->add($updateNewsStatus);


        // add "newsAuthorRule"
        // add the rule
        $rule = new \app\rbac\NewsAuthorRule;
        $auth->add($rule);

        // add the "updateOwnNews" permission and associate the rule with it.
        $updateOwnNews = $auth->createPermission('updateOwnNews');
        $updateOwnNews->description = 'Update own news article';
        $updateOwnNews->ruleName = $rule->name;
        $auth->add($updateOwnNews);

        // add the "deleteOwnNews" permission and associate the rule with it.
        $deleteOwnNews = $auth->createPermission('deleteOwnNews');
        $deleteOwnNews->description = 'Delete own news article';
        $deleteOwnNews->ruleName = $rule->name;
        $auth->add($deleteOwnNews);

        $auth->addChild($updateOwnNews, $updateNews);
        $auth->addChild($deleteOwnNews, $deleteNews);

        // add "createWeather" permission
        $createWeatherRecord = $auth->createPermission('createWeatherRecord');
        $createWeatherRecord->description = 'Create a Weather record';
        $auth->add($createWeatherRecord);

        // add "updateWeather" permission
        $updateWeatherRecord = $auth->createPermission('updateWeatherRecord');
        $updateWeatherRecord->description = 'Update a Weather record';
        $auth->add($updateWeatherRecord);

        // add "deleteWeather" permission
        $deleteWeatherRecord = $auth->createPermission('deleteWeatherRecord');
        $deleteWeatherRecord->description = 'Delete a Weather record';
        $auth->add($deleteWeatherRecord);

        // add "user" role
        $user = $auth->createRole('user');
        $auth->add($user);

        // add "modirator" role
        $modirator = $auth->createRole('modirator');
        $auth->add($modirator);
        $auth->addChild($modirator, $createNews);
        $auth->addChild($modirator, $updateOwnNews);
        $auth->addChild($modirator, $deleteOwnNews);
        $auth->addChild($modirator, $user);

        // add "admin" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateNews);
        $auth->addChild($admin, $updateNewsStatus);
        $auth->addChild($admin, $deleteNews);
        $auth->addChild($admin, $createWeatherRecord);
        $auth->addChild($admin, $updateWeatherRecord);
        $auth->addChild($admin, $deleteWeatherRecord);
        $auth->addChild($admin, $modirator);

        // Assign roles to some users
        $auth->assign($modirator, 2);
        $auth->assign($admin, 1);
      
    }

    public function down()
    {
       
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }

}
