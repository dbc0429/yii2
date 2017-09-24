<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $order
 * @property string $description
 *
 * @property SortOrder[] $sortOrders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order'], 'required'],
            [['order'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['order'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => 'Order',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSortOrders()
    {
        return $this->hasMany(SortOrder::className(), ['order_id' => 'id']);
    }
}
