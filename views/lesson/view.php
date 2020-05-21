<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
use app\models\ExamSet;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lesson-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('สร้างชุดคำถาม', ['/exam-set/create', 'lesson_id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'title',
            'content:html',
        ],
    ]) ?>
</div>


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อชุดเเบบทดสอบ</th>
            <th>ดำเนินการ</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (ExamSet::find()->where(['lesson_id' => $model->id])->all() as $item): ?>
        <tr>
            <td scope="row"><?=$item->id?></td>
            <td><?=$item->name?></td>
            <td>
            <?=Html::a('<i class="far fa-edit"></i>',['/question','lesson_id' => $model->id,'exam_set_id' => $item->id],['class' => 'btn btn-sm btn-info'])?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
