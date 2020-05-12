<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LessonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lesson_id') ?>

    <?= $form->field($model, 'lesson_date') ?>

    <?= $form->field($model, 'lesson_name') ?>

    <?= $form->field($model, 'lesson_detail') ?>

    <?= $form->field($model, 'lesson_file') ?>

    <?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
