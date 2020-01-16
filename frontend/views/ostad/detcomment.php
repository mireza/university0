<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */


?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('حذف', ['delcomment', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا مطمن هستید برای حذف ؟!!!',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    if ($model->published == 0) {
        ?>
        <p>
            <?= Html::a('تایید انتشار', ['enablec', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'آیا مطمن هستید برای انتشار ؟!!!',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?php
    }else {
        ?>
        <p>
            <?= Html::a(' عدم تایید انتشار', ['enablec', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'آیا مطمن هستید برای عدم انتشار ؟!!!',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'id_ostat',
            'id_user',
            'published',
            'time',

        ],
    ]) ?>

</div>
