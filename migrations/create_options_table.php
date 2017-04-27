<?php

/**
 * Created by PhpStorm.
 * User: vilderr
 * Date: 27.04.17
 * Time: 22:22
 */
class create_options_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%option}}', [
            'id'        => $this->primaryKey(),
            'module_id' => $this->string(255)->notNull(),
            'name'      => $this->string(255)->notNull(),
            'value'     => $this->string(255),
        ], $tableOptions);

        $this->createIndex('idx-option-name', '{{%option}}', ['module_id', 'name']);
    }

    public function down()
    {
        $this->dropTable('{{%option}}');
    }
}