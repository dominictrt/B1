<?php

use yii\bootstrap4\LinkPager;
use yii\widgets\Pjax;
use app\models\Examples;
// use lavrentiev\widgets\toastr\Notification;


$this->title = 'Examples';
$this->params['breadcrumbs'][] = $this->title;
// \Yii::$app->session->setFlash('error', 'This is the message');use lavrentiev\widgets\toastr\Notification;
?>

<div class="examples-index">
    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php foreach ($dataProvider->getmodels() as $qt): ?>

    <div id="lesson_id" value="<?=$qt->lesson_id?>"></div>
    <div id="exam_set_id" value="<?=$qt->exam_set_id?>"></div>
    <div id="question_id" value="<?=$qt->id?>"></div>
    <?=$qt->title;?>
    <div class="view-ex">view</div>
    <?php endforeach;?>
    <?php
        $dataProvider->getCount();
        echo LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
    ?>
    <?php
$js = <<< JS
getEx();

function getEx(){
    var lesson_id = $('#lesson_id').attr('value');
    var exam_set_id = $('#exam_set_id').attr('value');
    var question_id = $('#question_id').attr('value');
    $.ajax({
    type: "get",
    url: "index.php?r=examples/create",
    data: {
        lesson_id:lesson_id,
        exam_set_id:exam_set_id,
        question_id:question_id
    },
    dataType: "json",
    success: function (response) {
        $('.view-ex').html(response);
    }
});
}

JS;
$this->registerJS($js);

?>

    <?php Pjax::end();?>

</div>