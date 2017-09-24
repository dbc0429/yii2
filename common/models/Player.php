<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property string $id
 * @property string $team_event_id
 * @property int $gender_id
 * @property string $name
 *
 * @property Gender $gender
 * @property TeamEvent $teamEvent
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender_id'], 'required', 'message' => 'Please select a Gender.'],
            [['team_event_id', 'name'], 'required'],
            [['team_event_id', 'gender_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['team_event_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeamEvent::className(), 'targetAttribute' => ['team_event_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_event_id' => 'Team Event ID',
            'gender_id' => 'Gender ID',
            'name' => 'Full Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     *
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeamEvent()
    {
        return $this->hasOne(TeamEvent::className(), ['id' => 'team_event_id']);
    }

    public function getTeam()
    {

        return $this->hasOne(Team::className(), ['id' => 'team_id'])
                    ->via('teamEvent');
    }

    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id'])
                    ->via('teamEvent');
    }
}
