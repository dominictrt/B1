<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'q_id') ?>

    <?= $form->field($model, 'qu_id') ?>

    <?= $form->field($model, 'qu_detail') ?>

    <?= $form->field($model, 'ans1') ?>

    <?= $form->field($model, 'ans2') ?>

    <?php // echo $form->field($model, 'ans3') ?>

    <?php // echo $form->field($model, 'ans4') ?>

    <?php // echo $form->field($model, 'ans_correct') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
