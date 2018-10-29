<?php

use yii\db\Migration;

/**
 * Handles the creation of table `day`.
 */
class m181027_191843_create_day_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('day', [
            'id_day' => $this->primaryKey(),
            'day_timestamp' => $this->timestamp()->defaultExpression("now()"),
            'is_weekend' => $this->boolean()->defaultValue(false),
            'is_holiday' => $this->boolean()->defaultValue(false),
            'day_name' => $this->string(11),
            'id_activity' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('day');
    }
}
