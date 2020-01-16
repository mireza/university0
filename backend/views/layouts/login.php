<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

\backend\assets\AppAssetLogin::register($this);
$url=Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ورود به مدیریت</title>

    <?php $this->head() ?>
</head>
<body style=" background-image: url('<?=$url->hostInfo.'/upload/login-bg.jpg' ?>'); background-attachment: fixed; background-repeat: no-repeat; background-size: 100% 100%">
<?php $this->beginBody() ?>



<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"  >ورود به مدیریت</h3>
                </div>
                <div class="panel-body">

                    <?= Alert::widget() ?>
                    <?= $content ?>

                </div>
            </div>
        </div>
    </div>
</div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
