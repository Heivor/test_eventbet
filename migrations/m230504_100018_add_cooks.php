<?php

use yii\db\Migration;

/**
 * Class m230504_100018_add_cooks
 */
class m230504_100018_add_cooks extends Migration
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

        $this->createTable('{{%cooks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%dishes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->unique()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%dishes_to_cooks}}', [
            'cook_id' => $this->integer()->unsigned()->notNull(),
            'dish_id' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('cook_id_index', '{{%dishes_to_cooks}}', 'cook_id');
        $this->createIndex('dish_id_index', '{{%dishes_to_cooks}}', 'dish_id');

        $this->createTable('{{%checks}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11)->unsigned(),
            'updated_at' => $this->integer(11)->unsigned(),
        ], $tableOptions);

        $this->createTable('{{%checks_to_dishes}}', [
            'check_id' => $this->integer()->unsigned()->notNull(),
            'dish_id' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('check_id_index', '{{%checks_to_dishes}}', 'check_id');
        $this->createIndex('dish_id_index', '{{%checks_to_dishes}}', 'dish_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cooks}}');
        $this->dropTable('{{%dishes}}');
        $this->dropTable('{{%dishes_to_cooks}}');
        $this->dropTable('{{%checks_to_dishes}}');
    }
}
