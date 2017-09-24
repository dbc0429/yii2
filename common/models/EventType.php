<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_type".
 *
 * @property int $id
 * @property string $type
 * @property string $description
 * @property int $event_classification_id
 *
 * @property Event[] $events
 * @property EventClassification $eventClassification
 * @property TeamEvent[] $teamEvents
 */
class EventType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'event_classification_id'], 'required'],
            [['event_classification_id'], 'integer'],
            [['type'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['type'], 'unique'],
            [['event_classification_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventClassification::className(), 'targetAttribute' => ['event_classification_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Event Type',
            'description' => 'Description',
            'event_classification_id' => 'Event Classification ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['event_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventClassification()
    {
        return $this->hasOne(EventClassification::className(), ['id' => 'event_classification_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamEvents()
    {
        return $this->hasMany(TeamEvent::className(), ['event_type_id' => 'id']);
    }
}
