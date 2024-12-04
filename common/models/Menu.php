<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $label Menu Label
 * @property string|null $url Route or URL
 * @property int|null $parent_id Parent Menu ID
 * @property int|null $sort_order Order in Sidebar
 * @property string|null $icon FontAwesome Icon
 * @property int|null $is_active Is Active
 */
class Menu extends \yii\db\ActiveRecord
{
    const IS_ACTIVE = 1;
    const IS_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label'], 'required'],
            [['parent_id', 'sort_order', 'is_active'], 'integer'],
            [['label', 'url'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'url' => 'Url',
            'parent_id' => 'Parent ID',
            'sort_order' => 'Sort Order',
            'icon' => 'Icon',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Fetch all active menus, optionally ordered by `sort_order`.
     */
    public static function getMenuItems()
    {
        return self::find()
            ->where(['is_active' => 1])
            ->orderBy(['parent_id' => SORT_ASC, 'sort_order' => SORT_ASC])
            ->asArray()
            ->all();
    }
}
