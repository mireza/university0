<?php
/**
 * Created by PhpStorm.
 * User: fateme
 * Date: 31/01/2019
 * Time: 01:26 AM
 */


use common\models\AuthAssignment;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'تیکت ها');
$this->params['breadcrumbs'][] = $this->title;
$roleadmin = AuthAssignment::findOne(['user_id' => Yii::$app->user->getId()]);

?>



<h1><?= Html::encode($this->title) ?></h1>
تیکت های من

<?php
$profile = \common\models\Profile::findOne(['id_user' => Yii::$app->user->getId()]);
if ($profile->role == 'user') {
    ?>
    <p>
        <?= Html::a(Yii::t('app', 'ارسال تیکت جدید'), ['createticket'], ['class' => 'btn btn-success t-send-new white-color', 'style' => 'margin-top:20px']) ?>
    </p><br><br>

    <?php
}
?>





<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'receiver_id',
        ],
        [
            'attribute' => 'title',
        ],

        [
            'attribute' => 'sender_id',
            'value'=>function($model){
                return 'ارسال کننده : ' .\common\models\Profile::findOne(['id_user'=>$model->sender_id])->name;
            }
        ],


        ['class' => 'yii\grid\ActionColumn',
            'template' => '{detail}',

            'buttons' => [

                'detail' => function ($url, $model) {
                    return
                        ' 
                                 <a href="/ostad/detailt?id=' . $model->id . '" class="white-color sec-btn">گفتگو</a>
                               ';
                }
                ,
            ],

        ],
    ],
]); ?>



