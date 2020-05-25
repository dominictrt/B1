<?php
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
   NavBar::begin([
       'brandLabel' => Yii::$app->name,
       'brandUrl' => Yii::$app->homeUrl,
       'options' => [
           'class' => 'fixed-top navbar-expand-md navbar-dark bg-dark',
       ],
       
   ]);
   $menuItems = [
       ['label' => '<i class="fas fa-house-user"></i> หน้าเเรก', 'url' => ['/site']],
       ['label' => '<i class="fas fa-book-open"></i> บทเรียน', 'url' => ['/lesson']],
       ['label' => '<i class="fas fa-user-tag"></i> ข้อมูลส่วนตัว', 'url' => ['/profile']],
      
   ];
   if (Yii::$app->user->isGuest) {
       $menuItems[] = '<li>'.Html::a('<i class="fas fa-fingerprint"></i> Login',['/user/security/login'],['class' => 'btn btn-primary']).'</li>';

   } else {
       $menuItems[] = '<li>'
           . Html::beginForm(['/user/security/logout'], 'post')
           . Html::submitButton(
               '<i class="fas fa-power-off"></i> Logout (' . Yii::$app->user->identity->username . ')',
               ['class' => 'btn btn-danger logout']
           )
           . Html::endForm()
           . '</li>';
   }
   echo Nav::widget([
       'options' => ['class' => 'navbar-nav ml-auto'],
       'items' => $menuItems,
       'encodeLabels' => false,
   ]);
   NavBar::end();
   ?>