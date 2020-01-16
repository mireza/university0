<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$user=\common\models\Profile::findOne(['id_user'=>Yii::$app->user->getId()]);
?>
<div class="site-index" style="display: flex; justify-content: center;font-size: 25px;font-weight: bold">

<?= $user->name ?> خوش امدید

</div>
