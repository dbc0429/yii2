<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "venue".
 *
 * @property string $id
 * @property string $venue
 * @property string $description
 *
 * @property LocationVenue[] $locationVenues
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['venue'], 'required'],
            [['venue'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'venue' => 'Venue',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationVenues()
    {
        return $this->hasMany(LocationVenue::className(), ['venue_id' => 'id']);
    }
}
