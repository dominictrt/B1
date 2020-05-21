<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionList */

$this->title = 'Update Question List: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Question Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
