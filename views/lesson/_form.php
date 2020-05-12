<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_date')->textInput() ?>

    <?= $form->field($model, 'lesson_name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'lesson_detail')->widget(CKEditor::className(),[
    'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
]);?>

    <?= $form->field($model, 'lesson_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>