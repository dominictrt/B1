<?php

use yii\bootstrap4\LinkPager;
use yii\widgets\Pjax;
use app\models\Examples;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExamplesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examples';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="examples-index">
    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php foreach ($dataProvider->getmodels() as $qt): ?>
    <?=$qt->lesson_id?>
    <?php
    print_r($dataProvider->getmodels())
    ?>
<div id="lesson_id" value="<?=$qt->lesson_id?>"></div>
<div id="exam_set_id" value="<?=$qt->exam_set_id?>"></div>
<div id="question_id" value="<?=$qt->question_id?>"></div>
<div class="view-ex" >view</div>

<?php endforeach;?>
<?php
$dataProvider->getCount();
echo LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
?>
<?php
$js = <<< JS

// getEx();

// function getEx(){
//     var lesson_id = $('#lesson_id').attr('value');
//     var exam_set_id = $('#exam_set_id').attr('value');
//     var question_id = $('#question_id').attr('value');

//     $.ajax({
//     type: "get",
//     url: "index.php?r=examples/create",
//     data: {
//         lesson_id:lesson_id,
//         exam_set_id:exam_set_id,
//         question_id:question_id
//     },
//     dataType: "json",
//     success: function (response) {
//         $('.view-ex').html(response);
//     }
// });
// }

JS;
$this->registerJS($js);

?>

    <?php Pjax::end();?>

</div>
