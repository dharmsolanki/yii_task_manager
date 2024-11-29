<?php

use yii\db\Migration;

/**
 * Class m241129_100405_add_default_value_to_updated_at_column
 */
class m241129_100405_add_default_value_to_updated_at_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('task', 'updated_at', $this->dateTime()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('task', 'updated_at', $this->dateTime()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241129_100405_add_default_value_to_updated_at_column cannot be reverted.\n";

        return false;
    }
    */
}
