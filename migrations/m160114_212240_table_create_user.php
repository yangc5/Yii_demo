<?php

use yii\db\Schema;
use yii\db\Migration;

class m160114_212240_table_create_user extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'authkey' => 'string NOT NULL',
            'accessToken' => 'string NULL'
        ]);

        $this->insert('user', [
            'username' => 'admin',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'authkey' => uniqid()
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
