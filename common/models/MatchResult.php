<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match_result".
 *
 * @property int $id
 * @property string $result
 * @property string $description
 *
 * @property EventTeamRound[] $eventTeamRounds
 */
class MatchResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['result'], 'required'],
            [['result'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['result'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'result' => 'Result',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeamRounds()
    {
        return $this->hasMany(EventTeamRound::className(), ['match_result_id' => 'id']);
    }
}
