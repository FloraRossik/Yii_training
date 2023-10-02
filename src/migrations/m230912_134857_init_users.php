<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m230912_134857_init_users
 */
class m230912_134857_init_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $admin = new User();
        $admin->username =  env('ADMIN_USERNAME', 'admin');
        $admin->email = env('ADMIN_EMAIL', 'admin@test.com');
        $admin->password = Yii::$app->getSecurity()->generatePasswordHash(env('ADMIN_PASSWORD', 'secret'));
        $admin->save();

        $moderator = new User();
        $moderator->username =  env('MODERATOR_USERNAME', 'moderator');
        $moderator->email = env('MODERATOR_EMAIL', 'moderator@test.com');
        $moderator->password = Yii::$app->getSecurity()->generatePasswordHash(env('MODERATOR_PASSWORD', 'secret'));
        $moderator->save();

        Yii::$app->cache->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230912_134857_init_users cannot be reverted.\n";

        return false;
    }
    */
}
