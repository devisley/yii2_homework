<?php

use yii\db\Migration;

/**
 * Class m181027_193650_add_foreign_keys
 */
class m181027_193650_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('activity-user', 'activity', 'id_user', 'user', 'id_user');
        $this->addForeignKey('day-activity','day','id_activity','activity','id_activity');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity-user', 'activity');
        $this->dropIndex('activity-user', 'activity');
        $this->dropForeignKey('day-activity','day');
        $this->dropIndex('day-activity','day');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181027_193650_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
