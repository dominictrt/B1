<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Question', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('เพิ่มคำถาม', ['/question/create', 'lesson_id' => $lesson_id,'exam_set_id' => $exam_set_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'lesson_id',
                'value' => function($model){
                    return $model->lesson->title;
                },
                'group' => true,  // enable grouping,
            'groupedRow' => true,                    // move grouped column to a single grouped row
            'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
            'groupEvenCssClass' => 'kv-grouped-row', // configure even gro
            ], [
                'attribute' => 'exam_set_id',
                'value' => function($model){
                    return $model->examSet->name;
                },
                'group' => true,  // enable grouping,
                'hAlign' => 'center',
                'vAlign' => 'middle',
            ],
            'title',
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' =>'140px'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>