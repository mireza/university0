<?php

use yii\db\Migration;

/**
 * Class m200109_173211_create_changeonn
 */
class m200109_173211_create_changeonn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn('ticket','role','string');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200109_173211_create_changeonn cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200109_173211_create_changeonn cannot be reverted.\n";

        return false;
    }
    */
}
