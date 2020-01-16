<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$news = \common\models\News::find()->orderBy(['id' => SORT_DESC])->all();
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="color: lightgray">دانشگاه شهرضا</h1></div>

    <div class="body-content">

        <div class="row">
            <div style="display: flex;justify-content: center">
                <h1 style="font-weight: bold">خبرنامه ها</h1>
            </div>
            <?php
            foreach ($news as $n) {
                ?>
                <div class="col-lg-4">
                    <h2> <?= $n->title ?></h2>
                    <h4> <?= 'استاد : '.\common\models\Profile::findOne(['id_user'=>$n->id_user])->name ?></h4>
                    <p> <?= substr($n->content, '0', '80') ?></p>
                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detnew?id=' . $n->id]) ?>">بیشتر
                        بخوانیم</a>
                </div>
                <?php
            }
            ?>

        </div>

    </div>
</div>
