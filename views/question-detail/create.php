<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionDetail */

$this->title = 'Create Question Detail';
$this->params['breadcrumbs'][] = ['label' => 'Question Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
