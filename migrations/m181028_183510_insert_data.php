<?php

use yii\db\Migration;

/**
 * Class m181028_183510_insert_data
 */
class m181028_183510_insert_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('book', ['title' => 'Красная книга']);
        $this->insert('book', ['title' => 'Зеленая книга']);
        $this->insert('book', ['title' => 'Синяя книга']);
        $this->insert('book', ['title' => 'Желтая книга']);

        $this->insert('author', ['name' => 'Анна', 'email' => 'anna@111.local']);
        $this->insert('author', ['name' => 'Ольга', 'email' => 'olga@111.local']);
        $this->insert('author', ['name' => 'Виктор', 'email' => 'victor@111.local']);
        $this->insert('author', ['name' => 'Николай', 'email' => 'nikolay@111.local']);


        $this->insert('bookAuthor', ['book_id' => 1, 'author_id' => 1]);
        $this->insert('bookAuthor', ['book_id' => 1, 'author_id' => 2]);
        $this->insert('bookAuthor', ['book_id' => 3, 'author_id' => 1]);
        $this->insert('bookAuthor', ['book_id' => 3, 'author_id' => 2]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('bookAuthor');
        $this->truncateTable('author');
        $this->truncateTable('book');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181028_183510_insert_data cannot be reverted.\n";

        return false;
    }
    */
}
