<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$profile = \backend\models\Profile::findOne(['id_user' => Yii::$app->user->getId()]);
$url = Yii::$app->urlManager;

?>

<?= Html::csrfMetaTags() ?>


<?php $this->beginPage() ?>

<?php

?>

<!DOCTYPE html>
<html lang="fa"  hidden">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>مدیریت سایت</title>

    <?php $this->head() ?>
</head>
<body class="hold-transition skin-admin sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    <header class="main-header">

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">تعویض منو</span>
            </a>
            <div class="navbar-custom-menu">
                <ul id="topleftnav" class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">نام کاربری </span>
                            <i class="glyphicon glyphicon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <p>
                                    <?= $profile->name ?>
                                </p>

                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?= $url->createAbsoluteUrl(['site/logout']) ?>"
                                       class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left info">
                    <p><?= $profile->name ?></p>
                </div>
                <br>

                <a class="btn btn-social bg-orange btn-block btn-labeled" href="<?= $url->getHostInfo() ?>"
                   target="_blank">
                    <i class="glyphicon glyphicon-home"></i>
                    <span>مشاهده سایت</span>
                </a>
                <div class="clearfix"></div>

                <div class="clearfix"></div>
                <hr/>
            </div>
            <ul class="sidebar-menu">

                <li class="treeview">
                    <a href="<?= $url->createAbsoluteUrl(['site/index']) ?>">
                        <i class="glyphicon glyphicon-plus"></i> <span>داشبورد</span>
                    </a>
                </li>


                <li class="treeview">
                    <a>
                        <i class="glyphicon glyphicon-user"></i>
                        <span>استادان </span>
                        <i class="glyphicon glyphicon-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= $url->createAbsoluteUrl(['profile/index']) ?>"><i
                                        class="glyphicon glyphicon-edit"></i>لیست استادان </a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['profile/create']) ?>"><i
                                        class="glyphicon glyphicon-lock"></i>افزودن استاد</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="<?= $url->createAbsoluteUrl(['site/logout']) ?>">
                        <i class="glyphicon glyphicon-plus"></i> <span>خروج</span>
                    </a>
                </li>

            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
