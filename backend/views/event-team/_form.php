<?php
//TODO: delete Team Fields

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Event;
use common\models\EventType;
use common\models\Team;
use common\models\TeamEvent;
use common\models\EventTeamStatus;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\EventTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Event::find()->orderBy('id')->all(),'id','event'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Event'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Event');
    ?>

    <?= $form->field($model, 'team_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Team::find()->orderBy('id')->all(),'id','team'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Team'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Team');
    ?>

    <?= $form->field($model, 'event_type_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(EventType::find()->orderBy('id')->all(),'id','type'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Event Type'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Event Type');
    ?>
    <?php
    //     echo $form->field($model, 'event_team_status_id')->widget(Select2::classname(), [
    //     'data' => ArrayHelper::map(EventTeamStatus::find()->orderBy('id')->all(),'id','status'),
    //     'language' => 'en',
    //     'options' => ['placeholder' => 'Select Team Status'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
    // ])->label('Team Status');
    ?>

    <?php //echo $form->field($model, 'team_order')->textInput() ?>

    <?php //echo $form->field($model, 'total_wins')->textInput() ?>

    <?php //echo $form->field($model, 'total_draws')->textInput() ?>

    <?php //echo $form->field($model, 'total_loss')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
