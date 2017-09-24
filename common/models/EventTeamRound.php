<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_team_round".
 *
 * @property string $id
 * @property string $event_team_id
 * @property string $event_round_id
 * @property int $match_result_id
 * @property string $remarks
 *
 * @property EventRoundMatch[] $eventRoundMatches
 * @property EventRoundMatch[] $eventRoundMatches0
 * @property EventRound $eventRound
 * @property EventTeam $eventTeam
 * @property MatchResult $matchResult
 */
class EventTeamRound extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_team_round';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_team_id', 'event_round_id', 'match_result_id'], 'required'],
            [['event_team_id', 'event_round_id', 'match_result_id'], 'integer'],
            [['remarks'], 'string', 'max' => 250],
            [['event_round_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventRound::className(), 'targetAttribute' => ['event_round_id' => 'id']],
            [['event_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTeam::className(), 'targetAttribute' => ['event_team_id' => 'id']],
            [['match_result_id'], 'exist', 'skipOnError' => true, 'targetClass' => MatchResult::className(), 'targetAttribute' => ['match_result_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_team_id' => 'Event Team ID',
            'event_round_id' => 'Event Round ID',
            'match_result_id' => 'Match Result ID',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRoundMatches()
    {
        return $this->hasMany(EventRoundMatch::className(), ['event_team1_round_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRoundMatches0()
    {
        return $this->hasMany(EventRoundMatch::className(), ['event_team2_round_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRound()
    {
        return $this->hasOne(EventRound::className(), ['id' => 'event_round_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeam()
    {
        return $this->hasOne(EventTeam::className(), ['id' => 'event_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatchResult()
    {
        return $this->hasOne(MatchResult::className(), ['id' => 'match_result_id']);
    }
}
