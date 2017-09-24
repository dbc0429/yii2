<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_round_match".
 *
 * @property string $id
 * @property string $event_team1_round_id
 * @property string $event_team2_round_id
 * @property int $match_status_id
 * @property int $team1_score
 * @property int $team2_score
 *
 * @property EventTeamRound $eventTeam1Round
 * @property EventTeamRound $eventTeam2Round
 * @property MatchStatus $matchStatus
 */
class EventRoundMatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_round_match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_team1_round_id', 'event_team2_round_id', 'match_status_id', 'team1_score', 'team2_score'], 'required'],
            [['event_team1_round_id', 'event_team2_round_id', 'match_status_id', 'team1_score', 'team2_score'], 'integer'],
            [['event_team1_round_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTeamRound::className(), 'targetAttribute' => ['event_team1_round_id' => 'id']],
            [['event_team2_round_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTeamRound::className(), 'targetAttribute' => ['event_team2_round_id' => 'id']],
            [['match_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MatchStatus::className(), 'targetAttribute' => ['match_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_team1_round_id' => 'Event Team1 Round ID',
            'event_team2_round_id' => 'Event Team2 Round ID',
            'match_status_id' => 'Match Status ID',
            'team1_score' => 'Team1 Score',
            'team2_score' => 'Team2 Score',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeam1Round()
    {
        return $this->hasOne(EventTeamRound::className(), ['id' => 'event_team1_round_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeam2Round()
    {
        return $this->hasOne(EventTeamRound::className(), ['id' => 'event_team2_round_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatchStatus()
    {
        return $this->hasOne(MatchStatus::className(), ['id' => 'match_status_id']);
    }
}
