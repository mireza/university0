<?php

use yii\db\Migration;

/**
 * Class m200108_003737_init_rbac
 */
class m200108_003737_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');
        $ostad = $auth->createRole('ostad');
        $auth->add($admin);
        $auth->add($user);
        $auth->add($ostad);
        $auth->addChild($admin, $user);
        $auth->assign($admin, 1);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200108_003737_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200108_003737_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
