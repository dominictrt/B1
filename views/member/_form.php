<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_edu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
