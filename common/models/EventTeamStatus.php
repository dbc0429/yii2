<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_team_status".
 *
 * @property int $id
 * @property string $status
 * @property string $description
 *
 * @property EventTeam[] $eventTeams
 */
class EventTeamStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_team_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['status'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeams()
    {
        return $this->hasMany(EventTeam::className(), ['event_team_status_id' => 'id']);
    }
}
