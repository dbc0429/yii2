<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property string $id
 * @property int $occasion_id
 * @property string $location_venue_id
 * @property int $event_type_id
 * @property string $event
 * @property string $description
 * @property int $event_category_id
 * @property int $event_status_id
 * @property int $match_system_id
 * @property int $sort_order_id
 * @property int $min_team
 * @property int $max_team
 * @property string $champ
 * @property string $first
 * @property string $second
 * @property string $date_start
 * @property string $date_end
 *
 * @property EventType $eventType
 * @property Occasion $occasion
 * @property EventCategory $eventCategory
 * @property EventStatus $eventStatus
 * @property LocationVenue $locationVenue
 * @property MatchSystem $matchSystem
 * @property SortOrder $sortOrder
 * @property EventRound[] $eventRounds
 * @property EventTeam[] $eventTeams
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
     public $event_category_dd;
     public $event_type_dd;
     public $location_dd;
     public $match_system_dd;
     public $occasion_dd;
     public $order_dd;
     public $sort_dd;
     public $venue_dd;
    public function rules()
    {
        return [
            [['event_category_dd'], 'required', 'message' => 'Please select an Event Category.'],
            [['event_type_dd'], 'required', 'message' => 'Please select an Event Type.'],
            [['location_dd'], 'required', 'message' => 'Please select a Location.'],
            [['match_system_dd'], 'required', 'message' => 'Please select a Match System.'],
            [['occasion_dd'], 'required', 'message' => 'Please select an Occasion.'],
            [['order_dd'], 'required', 'message' => 'Please select an Order Type.'],
            [['sort_dd'], 'required', 'message' => 'Please select a Sort type.'],
            [['venue_dd'], 'required', 'message' => 'Please select a Venue.'],
            [['occasion_id', 'location_venue_id', 'event_type_id', 'event', 'event_category_id', 'event_status_id', 'match_system_id', 'sort_order_id', 'min_team', 'max_team'], 'required'],
            [['occasion_id', 'location_venue_id', 'event_type_id', 'event_category_id', 'event_status_id', 'match_system_id', 'sort_order_id', 'min_team', 'max_team', 'champ', 'first', 'second'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['event'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
            [['event_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventType::className(), 'targetAttribute' => ['event_type_id' => 'id']],
            [['occasion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Occasion::className(), 'targetAttribute' => ['occasion_id' => 'id']],
            [['event_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCategory::className(), 'targetAttribute' => ['event_category_id' => 'id']],
            [['event_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventStatus::className(), 'targetAttribute' => ['event_status_id' => 'id']],
            [['location_venue_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationVenue::className(), 'targetAttribute' => ['location_venue_id' => 'id']],
            [['match_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => MatchSystem::className(), 'targetAttribute' => ['match_system_id' => 'id']],
            [['sort_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => SortOrder::className(), 'targetAttribute' => ['sort_order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'occasion_id' => 'Occasion ID',
            'location_venue_id' => 'Location Venue ID',
            'event_type_id' => 'Event Type ID',
            'event' => 'Event',
            'description' => 'Description',
            'event_category_id' => 'Event Category ID',
            'event_status_id' => 'Event Status ID',
            'match_system_id' => 'Match System ID',
            'sort_order_id' => 'Sort Order ID',
            'min_team' => 'Min Team',
            'max_team' => 'Max Team',
            'champ' => 'Champ',
            'first' => 'First',
            'second' => 'Second',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOccasion()
    {
        return $this->hasOne(Occasion::className(), ['id' => 'occasion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventCategory()
    {
        return $this->hasOne(EventCategory::className(), ['id' => 'event_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventStatus()
    {
        return $this->hasOne(EventStatus::className(), ['id' => 'event_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationVenue()
    {
        return $this->hasOne(LocationVenue::className(), ['id' => 'location_venue_id']);
    }

    public function getLocation()
    {

        return $this->hasOne(Location::className(), ['id' => 'location_id'])
                    ->via('locationVenue');
    }

    public function getVenue()
    {
        return $this->hasOne(Venue::className(), ['id' => 'venue_id'])
                    ->via('locationVenue');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatchSystem()
    {
        return $this->hasOne(MatchSystem::className(), ['id' => 'match_system_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSortOrder()
    {
        return $this->hasOne(SortOrder::className(), ['id' => 'sort_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRounds()
    {
        return $this->hasMany(EventRound::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeams()
    {
        return $this->hasMany(EventTeam::className(), ['event_id' => 'id']);
    }
}
