<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_category".
 *
 * @property int $id
 * @property string $category
 * @property string $description
 *
 * @property Event[] $events
 */
class EventCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required', 'message' => 'Please select an Event Category.'],
            [['category'], 'required'],
            [['category'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['category'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['event_category_id' => 'id']);
    }
}
