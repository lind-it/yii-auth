<?php

use yii\db\Migration;


class m230914_112126_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'nickname' => $this->string()->notNull(),
            'login' => $this->string()->notNull(),
            'date' => $this->date(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'role' => "ENUM('пользователь', 'модератор', 'администратор') NOT NULL DEFAULT 'пользователь'"
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
