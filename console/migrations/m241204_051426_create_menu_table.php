<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m241204_051426_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'label' => $this->string(255)->notNull()->comment('Menu Label'),
            'url' => $this->string(255)->defaultValue(null)->comment('Route or URL'),
            'parent_id' => $this->integer()->defaultValue(null)->comment('Parent Menu ID'),
            'sort_order' => $this->integer()->defaultValue(0)->comment('Order in Sidebar'),
            'icon' => $this->string(100)->defaultValue(null)->comment('FontAwesome Icon'),
            'is_active' => $this->boolean()->defaultValue(1)->comment('Is Active'),
        ]);

        // Add index for `parent_id` to optimize parent-child relationships
        $this->createIndex(
            '{{%idx-menu-parent_id}}',
            '{{%menu}}',
            'parent_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop index
        $this->dropIndex('{{%idx-menu-parent_id}}', '{{%menu}}');

        // Drop table
        $this->dropTable('{{%menu}}');
    }
}
