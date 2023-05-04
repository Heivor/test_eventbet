<?php

use yii\db\Migration;

/**
 * Class m230504_110116_add_menu
 */
class m230504_110116_add_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'dish_id' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('dish_id_index', '{{%menu}}', 'dish_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230504_110116_add_menu cannot be reverted.\n";

        return false;
    }
}
