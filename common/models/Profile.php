<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property int $id_user
 * @property string $tell
 * @property string $role
 * @property string $img
 * @property string $scode
 * @property string $scodetime
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['name', 'tell', 'role', 'img', 'scode', 'scodetime'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_user' => 'Id User',
            'tell' => 'Tell',
            'role' => 'Role',
            'img' => 'Img',
            'scode' => 'Scode',
            'scodetime' => 'Scodetime',
        ];
    }
}
