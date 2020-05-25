<?php

use app\models\QuestionList;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <p>
        <?=Html::a('<i class="fas fa-plus"></i> เพิ่ม', ['/question-list/create',
    'lesson_id' => $lesson_id,
    'exam_set_id' => $exam_set_id,
    'question_id' => $question_id,
],
    ['class' => 'btn btn-success show-modal']);?>
    </p>
</div>
<?php foreach ($dataProvider->getModels() as $model): ?>
<?=$model->title?><br>
<ul>
    <?php foreach (QuestionList::find()->where(['question_id' => $model->id])->all() as $list): ?>
    <li><?=$list->clause;?> <?=$list->title;?></li>
    <?php endforeach;?>
</ul>
<?php endforeach;?>

<?php
Modal::begin(['id' => 'main-modal',
    'title' => '<h4 class="modal-title"></h4>',
    'footer' => '',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
]);
Modal::end();

$js = <<< JS

$('.show-modal').click(function (e) { 
    e.preventDefault();
    $('#main-modal').modal('show');
    $.ajax({
        type:"get",
        url: $(this).attr('href'),
        dataType: "json",
        success: function (res) {
        $('#main-modal-label').html(res.title);  
        $('.modal-body').html(res.content)
        $('.modal-footer').html(res.footer)
        }
    });
    console.log($(this).attr('href'))
    
});
JS;
$this->registerJS($js);
?>
