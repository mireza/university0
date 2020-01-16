<div class="body-content">
    <?php

    use yii\widgets\ActiveForm;
    use yii\helpers\Html;

    $data = new \common\components\jdf();
    $time = $data->date('Y/m/m H:i:s', $new->time)
    ?>

    <p>تاریخ : <?= $time ?></p>

    <div class="row">
        <div class="col-lg-4">
            <h2> <?= $new->title ?></h2>
            <h4> <?= 'استاد : ' . \common\models\Profile::findOne(['id_user' => $new->id_user])->name ?></h4>
            <p> <?= $new->content ?></p>
        </div>


    </div>

</div>
<hr>
<h3>کامنت ها</h3>
<?php
$com = \common\models\Comment::find()->where(['published' => 1])->andWhere(['id_new' => $new->id])->all();
if ($com) {
    foreach ($com as $c) {
        ?>
        <p>
            <?= \common\models\Profile::findOne(['id_user'=>$c->id_user])->name  ?> :
            <?= $c->text ?>

        </p>
        <br>
        <?php
    }
}
?>

<hr>

<?php
$form = ActiveForm::begin(['id' => 'login-form']); ?>

<?= $form->field($model, 'text')->textarea(['autofocus' => true])->label('ثبت کامنت') ?>

<div class="form-group">
    <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>
