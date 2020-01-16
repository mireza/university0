<?php
/**
 * Created by PhpStorm.
 * User: fateme
 * Date: 31/01/2019
 * Time: 12:42 AM
 */


use common\models\AuthAssignment;
use common\components\jdf;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="row">
    <?php
    if (isset($_SESSION['success'])) {
        if ($_SESSION['success'] != null) {
            ?>
            <div class="alert alert-success text-center"><?= $_SESSION['success'] ?></div>
            <?php
        }
        $_SESSION['success'] = null;
    }
    ?>
    <div class="col-lg-8 col-lg-offset-2 content-ticket" >
        <?php
        if($tickets){
            $parentid = \common\models\Ticket::findOne($_GET['id'])->id;
            $receiverid = \common\models\Ticket::findOne($_GET['id'])->sender_id;
            ?>

            <div class="row">
                <div class="col-xs-12 " role="alert" style="padding: 20px">
                    عنوان گفتگو :
                    <?php
                    echo  $tickets[0]['title'];?>
                </div>
                <?php
                foreach ($tickets as $key => $value) {

                        $class = ' alert alert-success ';
                        $style = ' style= "width: 70% ; float: right ; color: red" ';

                    ?>
                    <div class="col-xs-12 <?= $class ?>" <?= $style ?> >
                        <?php
                        $date = new jdf();
                        $date = $date->date('Y/m/d  h:i:s', $value['time']);
                        echo  $value['content'] .'<br><p style="font-size:12px;float:left ">'.$date;

                    ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } ?>
        <div class="row">

            <?php $form = ActiveForm::begin(['action' => ['saveresponse?parentid='.$parentid.'&receiverid='.$receiverid]]); ?>
            <div class="col-lg-6 ">
                <table class="determin">
                    <tr>
                        <td>پاسخ دهید</td>
                    </tr>
                    <tr>
                        <td>
                            <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button style=" margin-left: 30px ;background: #9cb4ff;border-radius: 5px;border: 1px solid #7e86ff;padding: 10px;"
                                    type="submit" >ثبت
                            </button>
                        </td>
                    </tr>
                </table>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

