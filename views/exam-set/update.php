<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExamSet */

$this->title = 'Update Exam Set: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exam Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exam-set-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
