<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
use app\models\QuestionList;
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Add_ans', ['/question-list/create', 
        'lesson_id' => $model->lesson_id,
        'exam_set_id' => $model->exam_set_id,
        'question_id' => $model->id
    ], 
        ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lesson.title',
            'examSet.name',
            'title',
            'ans_correct'
        ],
    ]) ?>

</div>

<table class="table table-sm table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>หัวข้อ</th>
            <th>คำตอบ</th>
            <th>ดำเนินการ</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach(QuestionList::find()->where([
    'lesson_id' => $model->lesson_id,
    'exam_set_id' => $model->exam_set_id,
    'question_id' => $model->id
    ])->all() as $qlist):?>
        <tr>
            <td scope="row">
            <?=$qlist->clause?>
            <?=$qlist->clause == $model->ans_correct ?  '<i class="fas fa-check text-success"></i>' : "";?>
            </td>
            <td>
                <?=$qlist->title;?>
            </td>
            <td>
                <p>
                    <?= Html::a('<i class="far fa-edit"></i>', ['/question-list/update', 'id' => $qlist->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= Html::a('<i class="fas fa-trash-alt"></i>', ['/question-list/delete', 'id' => $qlist->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
                </p>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>