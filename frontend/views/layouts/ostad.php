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
<html lang="fa" hidden">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>مدیریت پنل استاد</title>

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


                <div class="clearfix"></div>
                <hr/>
            </div>
            <ul class="sidebar-menu">

                <?php
                if ($profile->role == 'ostad') {
                    ?>

                    <li class="treeview">
                        <a href="<?= $url->createAbsoluteUrl(['ostad/index']) ?>">
                            <i class="glyphicon glyphicon-plus"></i> <span>داشبورد</span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a>
                            <i class="glyphicon glyphicon-user"></i>
                            <span>خبرنامه </span>
                            <i class="glyphicon glyphicon-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= $url->createAbsoluteUrl(['ostad/news']) ?>"><i
                                            class="glyphicon glyphicon-edit"></i>لیست خبرنامه ها </a></li>
                            <li><a href="<?= $url->createAbsoluteUrl(['ostad/createnews']) ?>"><i
                                            class="glyphicon glyphicon-lock"></i>افزودن خبرنامه</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a>
                            <i class="glyphicon glyphicon-user"></i>
                            <span>تیکت ها </span>
                            <i class="glyphicon glyphicon-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= $url->createAbsoluteUrl(['ostad/showticket']) ?>"><i
                                            class="glyphicon glyphicon-edit"></i>لیست تیکت ها </a></li>

                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="<?= $url->createAbsoluteUrl(['ostad/comment']) ?>">
                            <i class="glyphicon glyphicon-plus"></i> <span>لیست کامنت ها</span>
                        </a>
                    </li>


                    <?php
                } else {

                    ?>


                    <li class="treeview">
                        <a>
                            <i class="glyphicon glyphicon-user"></i>
                            <span>تیکت ها </span>
                            <i class="glyphicon glyphicon-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= $url->createAbsoluteUrl(['ostad/showticket']) ?>"><i
                                            class="glyphicon glyphicon-edit"></i>لیست تیکت ها </a></li>

                        </ul>
                    </li>


                    <?php
                }
                ?>
                <li class="treeview">
                    <a href="<?= $url->createAbsoluteUrl(['site/logout']) ?>">
                        <i class="glyphicon glyphicon-plus"></i> <span>خروج</span>
                    </a>
                </li>

            </ul>
        </section>
    </aside>
    <div class="content-wrapper">


        <div class="w3-col l10 m10 s12 main-d-card card-mt">
            <div class="row">
                <div class="container" style="width: 90%; max-width: 800px; padding-top: 50px; padding-bottom: 50px;">

                    <div class="panel panel-default">

                        <div class="panel-body">


                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="clear"></div>

        <!-- footer !-->

    </div>
    <footer class="main-footer">

    </footer>
    <div class="control-sidebar-bg"></div>


</div>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>


<script>
    function x(id) {
        var d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000 * 30));
        var expires = "expires=" + d.toUTCString();
        document.cookie = id + "notification=1;" + expires + ";path=/";
    }
</script>
