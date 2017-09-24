<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "occasion".
 *
 * @property int $id
 * @property string $occasion
 * @property string $description
 * @property string $date_start
 *
 * @property Event[] $events
 */
class Occasion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'occasion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['occasion', 'date_start'], 'required'],
            [['date_start'], 'safe'],
            [['occasion'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['occasion'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'occasion' => 'Occasion',
            'description' => 'Description',
            'date_start' => 'Date Start',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['occasion_id' => 'id']);
    }
}
