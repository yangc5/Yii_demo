<?php

use yii\db\Schema;
use yii\db\Migration;

class m150605_212402_my_first extends Migration
{
    public function up()
    {
        $this->createTable('MyFirst',array(

            'id' => 'pk',
            'name' => 'string NOT NULL',
            'Address'=> 'string'
        ));
    }

    public function down()
    {
        echo "m150605_212402_my_first cannot be reverted.\n";

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
