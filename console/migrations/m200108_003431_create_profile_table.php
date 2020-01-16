<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m200108_003431_create_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'id_user'=>$this->integer(),
            'tell'=>$this->string(),
            'role'=>$this->string(),
            'img'=>$this->string(),
            'scode'=>$this->string(),
            'scodetime'=>$this->string(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
