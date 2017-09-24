<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Gender;
use common\models\Team;
use common\models\TeamEvent;
use common\models\EventType;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Player */
/* @var $team common\models\Team */
/* @var $eventType common\models\EventType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'e.g. John Smith'])->label('Full Name') ?>

    <?= $form->field($model, 'gender_id')->radioList(
        ArrayHelper::map(Gender::find()->orderBy('id')->all(),'id','gender')
    )->label('Gender')
    ?>
    <?= $form->field($team, 'id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Team::find()->orderBy('id')->all(),'id','team'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Team'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Team Name');
    ?>
    <?= $form->field($eventType, 'id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(EventType::find()->orderBy('id')->all(),'id','type'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Event Type'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Event Type');
    ?>
    <!--TODO: delete lines below  -->
    <?php
    //  $model->team_event_id = Yii::$app->db->createCommand('SELECT id FROM team_event
    //     where event_type_id =' . $eventType->id . ' and team_id =' . $team->id)->queryScalar();
    ?>
    <?php
    //   echo $form->field($model, 'team_event_id',
    //   ['options' => ['value'=> $model->team_event_id] ])->hiddenInput()->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
