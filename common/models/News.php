<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $title
 * @property string $time
 * @property string $content
 * @property int $id_user
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['title', 'time', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'time' => 'Time',
            'content' => 'Content',
            'id_user' => 'Id User',
        ];
    }
}
