<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<style>
body {
    font-family: 'Kanit', sans-serif;
}
</style>

<body>
    <?php $this->beginBody() ?>
    <?php  echo $this->render('navbar');?>
    <?php if((Yii::$app->controller->id.'/'.Yii::$app->controller->action->id) == 'site/index'):?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        </ol>
        <br>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?=html::img('@web/img/pic1.PNG',['class' => 'first-slide','alt'=> 'First slide','style'=>'width:100%']);?>
                <div class="container">
                    <div class="carousel-caption text-center">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <?=html::img('@web/img/pic.PNG',['class' => 'second-slide','alt'=> 'Second slide','style'=>'width:100%']);?>
                <div class="container">
                    <div class="carousel-caption">
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php endif; ?>
    <div class="container mt-5">
        <br>
        <?php echo  Breadcrumbs::widget(
        []
            // 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <div id="element" class="toast " role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000"
            data-autohide="true" style="position: absolute;top: 71px;right: 10px;">
            <div class="toast-header bg-success text-white">
                <!-- <img src="..." class="rounded mr-2" alt="..."> -->
                <strong class="mr-auto"><i class="fas fa-check"></i> บันทึกสำเร็จ</strong>

                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>


    </div>
    <style>
    .footer {
        padding: 2px;
        width: 100%;
        background-color: #6c757d;
        color: white;
        text-align: center;
        position: fixed;
        bottom: 0px;
    }
    </style>
    <footer>
        <div class="footer">
            <p>English B1</p>
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>


</html>
<?php $this->endPage() ?>