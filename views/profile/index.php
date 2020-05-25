<?php
/* @var $this yii\web\View */
use app\models\ExamSet;
?>
<h1>profile/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true"><i class="fas fa-user-edit"></i> ข้อมูลส่วนตัว</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                    aria-controls="pills-contact" aria-selected="false"> <i class="fas fa-search"></i>ดูผลการทดสอบ</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h1>Home</h1>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <span class="badge badge-info right"><i class="far fa-check-square"></i>ทำได้</span>
                <span class="badge badge-success right"><i class="fas fa-spell-check"></i>ทั้งหมด</span>

                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query_ex = ExamSet::find()
                    ->joinwith('example')
                    ->groupby('examples.id')
                    ->orderby('examples.id', 'DESC')
                    ->all();
                    ?>
                        <?php foreach ($query_ex as $ex):?>
                        <tr>
                            <td><?=$ex->name;?></td>
                            <td>
                                <?php $a = $ex->ans($ex->id);?>
                                <span class="badge badge-info right"><i class="far fa-check-square"></i>
                                    <?=$a['total'];?></span>
                                <span class="badge badge-success right"><i class="fas fa-spell-check"></i>
                                    <?=$a['ans'];?></span>
                                คิดเป็น <?=$a['p'];?> %
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        style="width: <?=$a['p'];?>%"></div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>