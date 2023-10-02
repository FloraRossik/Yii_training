<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => sprintf("mysql:host=mysql;port=3306;dbname=%s", env('MYSQL_DATABASE')),
    'username' => env('MYSQL_USER'),
    'password' => env('MYSQL_PASSWORD'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
