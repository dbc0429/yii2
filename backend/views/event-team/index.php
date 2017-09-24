<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Event',
                'attribute' => 'event_id',
                'value' => 'event.event'
            ],
            [
                'label' => 'Team',
                'attribute' => 'team_name',
                'value' => 'teamEvent.team.team'
            ],
            [
                'label' => 'Event Type',
                'attribute' => 'event_type_name',
                'value' => 'teamEvent.eventType.type'
            ],
            [
                'label' => 'Event Team Status',
                'attribute' => 'event_team_status_id',
                'value' => 'eventTeamStatus.status'
            ],
            // 'team_order',
            'total_wins',
            'total_draws',
            'total_loss',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
