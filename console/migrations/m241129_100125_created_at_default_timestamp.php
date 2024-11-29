<?php

use yii\db\Migration;

/**
 * Class m241129_100125_created_at_default_timestamp
 */
class m241129_100125_created_at_default_timestamp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('task', 'created_at', $this->dateTime()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('task', 'created_at', $this->dateTime()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241129_100125_created_at_default_timestamp cannot be reverted.\n";

        return false;
    }
    */
}
