<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\QuestionList;

// $list = ArrayHelper::map(QuestionList::find()->where([
//     'lesson_id' => $lesson_id,
//     'exam_set_id' => $exam_set_id,
//     'question_id' => $question_id
//     ])->all(),'id','title');
?>

<div class="examples-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_id')->textInput(['value' => $lesson_id])->label(false) ?>

    <?= $form->field($model, 'exam_set_id')->textInput(['value' => $exam_set_id])->label(false) ?>

    <?= $form->field($model, 'question_id')->textInput(['value' => $question_id])->label(false) ?>

    <?php //  $form->field($model, 'answer')->radioList($list)->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
