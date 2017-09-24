<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sort_order".
 *
 * @property int $id
 * @property int $sort_id
 * @property int $order_id
 *
 * @property Event[] $events
 * @property Order $order
 * @property Sort $sort
 */
class SortOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sort_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_id', 'order_id'], 'required'],
            [['sort_id', 'order_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['sort_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sort::className(), 'targetAttribute' => ['sort_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort_id' => 'Sort ID',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['sort_order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSort()
    {
        return $this->hasOne(Sort::className(), ['id' => 'sort_id']);
    }
}
