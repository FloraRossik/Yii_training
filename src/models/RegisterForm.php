<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirm_password;
    public $email;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'confirm_password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'username'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords must match'],
        ];
    }

    /**
     * Registers the user using the received data
     * @return bool whether the user is registered successfully
     * @throws \Exception
     */
    public function register()
    {
        if ($this->validate()) {
            $auth = \Yii::$app->authManager;

            $this->_user = new User();
            $this->_user->username = $this->username;
            $this->_user->email = $this->email;
            $this->_user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $this->_user->save();

            $defaultRole = $auth->getRole('user');
            $auth->assign($defaultRole, $this->_user->getId());

            Yii::$app->cache->flush();

            return Yii::$app->user->login($this->getUser());
        }

        return false;
    }

    public function getUser()
    {
        return $this->_user;
    }
}