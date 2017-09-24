<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match_status".
 *
 * @property int $id
 * @property string $status
 * @property string $description
 *
 * @property EventRoundMatch[] $eventRoundMatches
 */
class MatchStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match_status';
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
    public function getEventRoundMatches()
    {
        return $this->hasMany(EventRoundMatch::className(), ['match_status_id' => 'id']);
    }
}
