<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Pengguna;

class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'email atau password salah.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Pengguna::findOne(['email' => $this->email]);
        }
        return $this->_user;
    }
}
