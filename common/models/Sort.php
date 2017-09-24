<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sort".
 *
 * @property int $id
 * @property string $sort
 * @property string $description
 *
 * @property SortOrder[] $sortOrders
 */
class Sort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'required'],
            [['sort'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['sort'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort' => 'Sort',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSortOrders()
    {
        return $this->hasMany(SortOrder::className(), ['sort_id' => 'id']);
    }
}
