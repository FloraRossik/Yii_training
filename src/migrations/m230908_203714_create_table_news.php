<?php

use yii\db\Migration;

class m230908_203714_create_table_news extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'heading' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'author' => $this->integer()->notNull(),
            'image' => $this->string(),
            'created_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
            // 'updated_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
