<?php

use yii\db\Schema;
use yii\db\Migration;

class m150622_192202_create_status_table extends Migration
{
    public function up()
    {
        $this->createTable('status', [
                'id' => 'pk',
                'message' => 'string NOT NULL',
                'permissions' => 'int NOT NULL DEFAULT 0',
                'created_at' => 'int NOT NULL',
                'updated_at' => 'int NOT NULL'
            ]
        );

    }

    public function down()
    {
        $this->dropTable('status');

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
