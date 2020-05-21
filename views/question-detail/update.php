<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionDetail */

$this->title = 'Update Question Detail: ' . $model->q_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->q_id, 'url' => ['view', 'id' => $model->q_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
