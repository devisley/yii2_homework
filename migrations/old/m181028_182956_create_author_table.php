<?php

use yii\db\Migration;

/**
 * Handles the creation of table `author`.
 */
class m181028_182956_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'email' => $this->string(30)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropTable('author');
    }
}
