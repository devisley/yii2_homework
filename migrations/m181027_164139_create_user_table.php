<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181027_164139_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id_user' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(255)->notNull(),
            'last_access' => $this->timestamp()->defaultExpression("now()"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
