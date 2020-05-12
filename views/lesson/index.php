<?php

use yii\helpers\Html;
use kartik\grid\GridView;


$this->title = 'Lessons';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::$app->user->can('admin') ? Html::a('Create Lesson', ['create'], ['class' => 'btn btn-success']) : null; ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
                        
            'lesson_name',
            'lesson_date',
            
            //'username',

             [
                 'header' => 'ดำเนินการ',
                 'width' => '120px',
                 'class' => 'kartik\grid\ActionColumn',
                'template' => Yii::$app->user->can('admin') ? '{view} {update} {delete}' : ' {view} ',
                ],
        ],
    ]); ?>


</div>