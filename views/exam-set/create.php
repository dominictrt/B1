<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExamSet */

$this->title = 'Create Exam Set';
$this->params['breadcrumbs'][] = ['label' => 'Exam Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
