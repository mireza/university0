<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $text
 * @property int $id_ostat
 * @property int $id_new
 * @property int $id_user
 * @property int $published
 * @property string $time
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ostat', 'id_user', 'published','id_new'], 'integer'],
            [['text', 'time'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'id_ostat' => 'Id Ostat',
            'id_user' => 'Id User',
            'published' => 'Published',
            'time' => 'Time',
        ];
    }
}
