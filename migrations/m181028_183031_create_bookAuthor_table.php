<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bookAuthor`.
 */
class m181028_183031_create_bookAuthor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bookAuthor', [
            'id' => $this->primaryKey(),
            'book_id' =>$this->integer()->notNull(),
            'author_id' =>$this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-bookAuthor-book',
            'bookAuthor',
            'book_id',
            'book',
            'id'
        );

        $this->addForeignKey(
            'fk-bookAuthor-author',
            'bookAuthor',
            'author_id',
            'author',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-bookAuthor-book', 'bookAuthor');
        $this->dropForeignKey('fk-bookAuthor-author', 'bookAuthor');
        $this->dropTable('bookAuthor');
    }
}
