<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EventTeamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'team_event_id') ?>

    <?= $form->field($model, 'event_team_status_id') ?>

    <?= $form->field($model, 'team_order') ?>

    <?php // echo $form->field($model, 'total_wins') ?>

    <?php // echo $form->field($model, 'total_draws') ?>

    <?php // echo $form->field($model, 'total_loss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
