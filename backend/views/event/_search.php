<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'occasion_id') ?>

    <?= $form->field($model, 'location_venue_id') ?>

    <?= $form->field($model, 'event_type_id') ?>

    <?= $form->field($model, 'event') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'event_category_id') ?>

    <?php // echo $form->field($model, 'event_status_id') ?>

    <?php // echo $form->field($model, 'match_system_id') ?>

    <?php // echo $form->field($model, 'sort_id') ?>

    <?php // echo $form->field($model, 'min_team') ?>

    <?php // echo $form->field($model, 'max_team') ?>

    <?php // echo $form->field($model, 'champ') ?>

    <?php // echo $form->field($model, 'first') ?>

    <?php // echo $form->field($model, 'second') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
