<?php

use yii\db\Migration;

class m230911_190146_create_table_weather extends Migration
{
    public function up()
    {
        $this->createTable('weather', [
            'id' => $this->primaryKey(),
            'city' => $this->string()->notNull(),
            'temperature' => $this->string()->notNull(),
            'air_humidity' => $this->string()->notNull(),
            'wind' => $this->string(),
            'precipitation' => $this->string(),
            'date' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
            'created_at' => $this->dateTime()->defaultValue(Date('Y-m-d H:i:s')),
        ]);
    }

    public function down()
    {
        $this->dropTable('weather');
    }
}
