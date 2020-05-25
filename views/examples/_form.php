<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


?>

<div class="examples-form">

    <?php $form = ActiveForm::begin(['id' => 'example-form']); ?>
    <?=  $form->field($model, 'answer')->radioList($list,['class' => "saveclick"])->label(false) ?>
  
    <div class="form-group" hidden="true">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<< JS
$("input[name='Examples[answer]']").change(function (e) { 
    var val = $(this).val();
    $(this).submit();
});

$('#example-form').on('beforeSubmit', function(e) {
    var form = $(this);
    var url = form.attr('action');
e.preventDefault()
console.log(form)
    if (!form.hasClass('complete')) {
        $.ajax({
            url: url,
            method:form.attr('method'),
            data:form.serialize(),
            dataType: "json",
            success: function(res) {
                $('#element').toast('show');
            }
    
        });

        return false;
    }
});
JS;
$this->registerJS($js);
?>