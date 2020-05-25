<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionList */

$this->title = 'Create Question List';
$this->params['breadcrumbs'][] = ['label' => 'Question Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-list-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
