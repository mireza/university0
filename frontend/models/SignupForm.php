<?php
namespace frontend\models;

use common\models\Profile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $name;
    public $tell;




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['tell'], 'required'],

            [['name'], 'required'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email=null;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->status=10;
        $user->generateAuthKey();
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('user');
        if ($user->save()) {
            $auth->assign($authorRole, $user->getId());
            $profile = new Profile();
            $profile->tell = $this->tell;
            $profile->name = $this->name;
            $profile->id_user = $user->id;
            $profile->role = 'user';

            if ($profile->save()) {
                return $user;
            } else {

                $user->delete();
                $_SESSION['error'] = 'ثبت نام شما انجام نشد';
                return null;
            }

        } else {

            return null;

        }

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */

}
