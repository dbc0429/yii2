<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EventTeam */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Event Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event.event',
            'teamEvent.team.team',
            'teamEvent.eventType.type',
            'eventTeamStatus.status',
            // 'team_order',
            'total_wins',
            'total_draws',
            'total_loss',
        ],
    ]) ?>

</div>
