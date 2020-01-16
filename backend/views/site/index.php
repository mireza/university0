<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;


?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">

                <div class="col-lg-3 col-xs-6" style="text-align: center">
                    <!-- small box -->
                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['profile/update', 'id' => Yii::$app->user->identity->id]) ?>">
                        <div class="small-box bg-aqua" style=";border-radius: 5px">
                            <div class="inner">
                                <p>لیست استادان</p>
                            </div>
                            <div class="icon">
                                <i style="margin: 10px" class="fa fa-user"></i>

                            </div>

                        </div>
                    </a>
                </div><!-- ./col -->



            </div>

        </div>
    </div>
</section>

