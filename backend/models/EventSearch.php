<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Event;

/**
 * EventSearch represents the model behind the search form of `common\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
     public $location_name;
     public $venue_name;
     public $occasion_name;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['occasion_name', 'location_venue_id', 'event_type_id', 'sort_order_id', 'min_team', 'max_team', 'champ', 'first', 'second', 'event', 'description', 'date_start', 'date_end', 'location_name', 'venue_name', 'event_category_id', 'event_status_id', 'match_system_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Event::find();
        $query->joinWith('occasion');
        $query->joinWith('location');
        $query->joinWith('venue');
        $query->joinWith('eventCategory');
        $query->joinWith('eventStatus');
        $query->joinWith('matchSystem');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['occasion_name'] = [
            'asc' => ['location' => SORT_ASC],
            'desc' => ['location' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['location_name'] = [
            'asc' => ['location' => SORT_ASC],
            'desc' => ['location' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['venue_name'] = [
            'asc' => ['venue' => SORT_ASC],
            'desc' => ['venue' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'min_team' => $this->min_team,
            'max_team' => $this->max_team,
            // 'event.champ' => $this->champ,
            // 'event.first' => $this->first,
            // 'event.second' => $this->second,
            'event.date_start' => $this->date_start,
            'event.date_end' => $this->date_end,
        ]);

        $query->andFilterWhere(['like', 'event.event', $this->event])
            ->andFilterWhere(['like', 'event.description', $this->description])
            ->andFilterWhere(['like', 'occasion', $this->occasion_name])
            ->andFilterWhere(['like', 'location', $this->location_name])
            ->andFilterWhere(['like', 'venue', $this->venue_name])
            ->andFilterWhere(['like', 'category', $this->event_category_id . '%', false])
            ->andFilterWhere(['like', 'status', $this->event_status_id . '%', false])
            ->andFilterWhere(['like', 'system', $this->match_system_id . '%', false]);

        return $dataProvider;
    }
}
