<?php

use yii\db\Schema;
use yii\db\Migration;

class m150608_152259_posts extends Migration
{
    public function up()
    {
        $this->createTable('posts',array(

            'id' => 'pk',
            'title' => 'string NOT NULL',
            'data'=> 'string',
            'create_time' => 'INT',
            'update_time' => 'INT'
        ));
    }

    public function down()
    {
        echo "m150608_152259_posts cannot be reverted.\n";

        return false;
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
