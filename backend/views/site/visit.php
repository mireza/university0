<?php

use common\models\Visit;

$date=new \common\components\jdf();
$yesterday=$date->date('Y-m-d',time()-86400) ;
$today=$date->date('Y-m-d',time());

$visit=Visit::find();
$allVisit=$visit->where(['type'=>'all'])->sum('count');
$visitYesterday=$visit->where(['type'=>'all','date'=>$yesterday])->sum('count');
$visitToday=$visit->where(['type'=>'all','date'=>$today])->sum('count');



$alluser=$visit->where(['type'=>'user'])->sum('count');
$userYesterday=$visit->where(['type'=>'user','date'=>$yesterday])->sum('count');
$userToday=$visit->where(['type'=>'user','date'=>$today])->sum('count');






?>




<style>
    body {font-family: 'Shabnam FD';}
    .main-site-view { padding: 20px 40px; background: #eee; width: 80%; margin: 20px auto;
        display: block; box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.30);
        border-radius: 30px; }
    .view-head { color: #666;display: flex; align-items: baseline; justify-content: center;
        border-bottom: 3px solid #1fcfcc; padding-bottom: 14px; }
    .view-head img { position: relative; right: 10px; top: 2px; }
    .cnt {color: #1fcfcc; font-weight: bold; position: relative; right: 2px;}
    .sp-span-red { color: tomato; font-weight: bold; }
    .v-ul li { margin: 15px 0px; }
    .v-ul { border-bottom: 1px solid #ccc; padding-bottom: 15px; }
    .tlt { margin-right: 20px; }
    .tlt img { position: relative; top: 6px; animation: 1s ico infinite; }

    @keyframes ico {
        0% { transform: scale(1); }
        50% { transform: scale(1.08); }
        100% { transform: scale(1); }
    }

    @media only screen and (max-width: 600px) {
        .main-site-view {width: 90%; padding: 20px 5px;}
    }
</style>

<div class="main-site-view">

    <h3 class="view-head"> آمار بازدید سایت <img src="/frontend/web/img/bar-chart.svg" width="30px"></h3>

    <!-- آمار بازدید -->
    <div class="tlt"> آمار مربوط بازدید سایت: <img src="/frontend/web/img/eye.svg" width="25px" style="margin-top: -10px" > </div>

    <ul class="v-ul">
        <li>
            <div>
                تعداد کل صفحات بازدید شده

                <span class="sp-span-red">از روز اول تا کنون</span> :
<?= $allVisit > 0 ? $allVisit : 0?>
                <span class="cnt"> تعداد </span >

            </div>
        </li>


        <li>
            <div>
                تعداد کل صفحات بازدید شده

                <span class="sp-span-red">دیروز</span> :
<?= $visitYesterday  > 0 ? $visitYesterday : 0 ?>
                <span class="cnt"> تعداد </span >

            </div>
        </li>

        <li>
            <div>
                تعداد کل صفحات بازدید شده

                <span class="sp-span-red">  امروز </span> :
<?= $visitToday  > 0 ?  $visitToday :0 ?>
                <span class="cnt"> تعداد </span >

            </div>
        </li>

    </ul>


    <!-- آمار کاربران -->
    <div class="tlt"> آمار مربوط به بازدید کاربران: <img src="/frontend/web/img/user.svg" width="25px" style="margin-top: -10px" > </div>
    <ul class="v-ul">
        <li>
            <div>
                تعداد کل کاربرانی که

                <span class="sp-span-red"> از روز اول تا کنون </span> :

                وارد سایت شده اند:
                <?= $alluser  > 0 ? $alluser : 0 ?>

                <span class="cnt"> تعداد </span >

            </div>
        </li>


        <li>
            <div>
                تعداد  کاربرانی که

                <span class="sp-span-red">  دیروز  </span> :

                وارد سایت شده اند:
                <?= $userYesterday  > 0 ? $userYesterday : 0 ?>

                <span class="cnt"> تعداد </span >

            </div>
        </li>

        <li>
            <div>
                تعداد  کاربرانی که

                <span class="sp-span-red">  امروز  </span> :

                وارد سایت شده اند:
                <?= $userToday  > 0 ? $userToday : 0 ?>

                <span class="cnt"> تعداد </span >

            </div>
        </li>

    </ul>
</div>

