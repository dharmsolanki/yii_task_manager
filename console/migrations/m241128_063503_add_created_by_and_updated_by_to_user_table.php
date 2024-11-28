<?php

use yii\db\Migration;

/**
 * Class m241128_063503_add_created_by_and_updated_by_to_user_table
 */
class m241128_063503_add_created_by_and_updated_by_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Add 'created_by' column as an integer, allowing NULL
        $this->addColumn('{{%user}}', 'created_by', $this->integer()->defaultValue(null));

        // Add 'updated_by' column as an integer, allowing NULL
        $this->addColumn('{{%user}}', 'updated_by', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241128_063503_add_created_by_and_updated_by_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241128_063503_add_created_by_and_updated_by_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
