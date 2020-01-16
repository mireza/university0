<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $title
 * @property string $content
 * @property string $parent_id
 * @property string $role
 * @property int $time
 * @property int $status
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_id', 'status','sender_id', 'time'], 'integer'],
            [[ 'title', 'content', 'parent_id','role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'receiver_id' => 'Receiver ID',
            'title' => 'Title',
            'content' => 'Content',
            'parent_id' => 'Parent ID',
            'time' => 'Time',
            'status' => 'Status',
        ];
    }
}
