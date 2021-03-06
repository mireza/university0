<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'خبرنامه ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('جدید', ['createnews'], ['class' => 'btn btn-primary']) ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            ['class' => 'yii\grid\ActionColumn' ,
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model ){

                        return Html::a(
                            '<div class="clearfix"><span class="btn btn-danger btn-block " >حذف</span></div>'
                            ,['profile/delete', 'id' => $model->id ]
                        );
                    },
                ],

            ],
        ],
    ]); ?>
</div>
