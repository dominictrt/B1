<?php

use yii\helpers\Html;
use kartik\grid\GridView;


$this->title = 'Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lesson', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>