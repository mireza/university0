<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'کامنت  ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            ['attribute'=> 'id_user',
                'value'=>function($model){
        return \common\models\Profile::findOne(['id_user'=>$model->id_user])->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn' ,
                'template' => '{delete}{view}',
                'buttons' => [
                    'delete' => function ($url, $model ){

                        return Html::a(
                            '<div class="clearfix"><span class="btn btn-danger btn-block " >حذف</span></div>'
                            ,['ostad/delcomment', 'id' => $model->id ]
                        );
                    },

                    'view' => function ($url, $model ){
                        return Html::a(
                            '<div class="clearfix"><span class="btn btn-success btn-block " >نمایش</span></div>'
                            ,['ostad/detcomment', 'id' => $model->id ]
                        );
                    },
                ],

            ],
        ],
    ]); ?>
</div>
