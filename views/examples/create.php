<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Examples */

$this->title = 'Create Examples';
$this->params['breadcrumbs'][] = ['label' => 'Examples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examples-create">
    <?= $this->render('_form', [
        'model' => $model,
        'list' => $list
    ]) ?>

</div>
