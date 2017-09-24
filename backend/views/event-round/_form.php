<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventRound */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-round-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'round')->textInput() ?>

    <?= $form->field($model, 'round_status_id')->textInput() ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
