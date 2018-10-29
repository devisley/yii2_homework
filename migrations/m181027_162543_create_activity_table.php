<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity`.
 */
class m181027_162543_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id_activity' => $this->primaryKey(),
            'activity_name' => $this->string(255)->notNull(),
            'activity_start_timestamp' => $this->timestamp()->defaultExpression("now()"),
            'activity_end_timestamp' => $this->timestamp()->defaultExpression("now()"),
            'id_user' => $this->integer(),
            'place' => $this->string(255),
            'is_important' => $this->boolean()->defaultValue(false),
            'body' => $this->text()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }
}
