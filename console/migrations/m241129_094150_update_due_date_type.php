<?php

use yii\db\Migration;

/**
 * Class m241129_094150_update_due_date_type
 */
class m241129_094150_update_due_date_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%task}}', 'due_date', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%task}}', 'due_date', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241129_094150_update_due_date_type cannot be reverted.\n";

        return false;
    }
    */
}
