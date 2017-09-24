<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team_status".
 *
 * @property int $id
 * @property string $status
 * @property string $description
 *
 * @property Team[] $teams
 * @property TeamEvent[] $teamEvents
 */
class TeamStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team_status';
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
    public function getTeams()
    {
        return $this->hasMany(Team::className(), ['team_status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamEvents()
    {
        return $this->hasMany(TeamEvent::className(), ['team_status_id' => 'id']);
    }
}
