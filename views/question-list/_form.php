<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' =>$model->lesson->title, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->examSet->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->question->title;
?>
<div class="question-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'exam_set_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'question_id')->hiddenInput()->label(false) ?> 

    <?= $form->field($model, 'clause')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
