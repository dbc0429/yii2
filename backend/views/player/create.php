<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Player */
/* @var $eventType common\models\EventType */
/* @var $team common\models\Team */

$this->title = 'Create Player';
$this->params['breadcrumbs'][] = ['label' => 'Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'eventType' => $eventType,
        'team' => $team,
    ]) ?>

</div>
