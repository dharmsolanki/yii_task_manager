<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m241128_053048_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(), // Primary key
            'task_name' => $this->string(255)->notNull(), // Name of the task
            'description' => $this->text()->null(), // Task description
            'status' => $this->integer()->notNull()->defaultValue(0), // Status of the task (e.g., 0 = pending, 1 = completed)
            'priority' => $this->integer()->notNull()->defaultValue(1), // Priority (1 = Low, 2 = Medium, 3 = High)
            'due_date' => $this->date()->null(), // Due date for the task
            'created_at' => $this->integer()->notNull(), // Created timestamp as integer
            'updated_at' => $this->integer()->notNull(), // Updated timestamp as integer
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
