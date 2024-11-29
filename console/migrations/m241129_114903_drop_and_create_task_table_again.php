<?php

use yii\db\Migration;

/**
 * Class m241129_114903_drop_and_create_task_table_again
 */
class m241129_114903_drop_and_create_task_table_again extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Drop the existing 'task' table if it exists
        $this->dropTable('{{%task}}');

        // Recreate the 'task' table with the additional 'created_by' and 'updated_by' columns
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(), // Primary key
            'task_name' => $this->string(255)->notNull(), // Name of the task
            'description' => $this->text()->null(), // Task description
            'status' => $this->integer()->notNull()->defaultValue(0), // Status of the task (e.g., 0 = pending, 1 = completed)
            'priority' => $this->integer()->notNull()->defaultValue(1), // Priority (1 = Low, 2 = Medium, 3 = High)
            'due_date' => $this->date()->null(), // Due date for the task
            'created_at' => $this->integer()->notNull(), // Created timestamp as integer
            'updated_at' => $this->integer()->notNull(), // Updated timestamp as integer
            'created_by' => $this->integer()->notNull(), // User ID of the person who created the task
            'updated_by' => $this->integer()->notNull(), // User ID of the person who last updated the task
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the 'task' table
        $this->dropTable('{{%task}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241129_114903_drop_and_create_task_table_again cannot be reverted.\n";

        return false;
    }
    */
}
