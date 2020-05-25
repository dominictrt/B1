<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lesson', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id',
            'title',
            'content:html',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',

            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '140px',
                // 'template' => '{view} {update} {delete} {example}',
                // 'buttons'=>[
                //     'view' => function($url,$model,$key){
                //         return Html::a('ทำเเบบทดสอบ',$url);
                //       }
                //     ]
            ],
        ],
    ]); ?>

    <?php // Pjax::end(); ?>

</div>
