<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match_system".
 *
 * @property int $id
 * @property string $system
 * @property string $description
 *
 * @property Event[] $events
 */
class MatchSystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['system'], 'required'],
            [['system'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['system'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system' => 'System',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['match_system_id' => 'id']);
    }
}
