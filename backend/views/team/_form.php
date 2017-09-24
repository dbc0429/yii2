<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'team_status_id')->textInput() ?>

    <?php //echo $form->field($model, 'since')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'champ')->textInput() ?>

    <?php //echo $form->field($model, 'first')->textInput() ?>

    <?php //echo $form->field($model, 'second')->textInput() ?>

    <?php //echo $form->field($model, 'wins')->textInput() ?>

    <?php //echo $form->field($model, 'draws')->textInput() ?>

    <?php //echo $form->field($model, 'losses')->textInput() ?>

    <?php //echo $form->field($model, 'rating')->textInput() ?>

    <?php //echo $form->field($model, 'last_played')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
