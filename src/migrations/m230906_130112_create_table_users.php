<?php

use yii\db\Migration;

class m230906_130112_create_table_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(64)->notNull(),
            'password' => $this->string(120)->notNull(),
            'email' => $this->string(64)->notNull(),
            'access_token' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
