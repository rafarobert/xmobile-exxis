<?php
namespace backend\modules\Login\models;

use Yii;
use yii\base\Model;
use backend\modules\Login\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['username', 'required','message' => 'El Nombre de Usuario no puede estar vacio.'],
            ['password','required','message' => 'La contraseña no puede estar vacia'],
            ['password', 'validatePassword'],
            ['username','match','pattern' => '/^[A-Za-z0-9\_]+$/','message'=>'El formato de nombre de usuario es invalido.']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Nombre de Usuario o contraseña incorrectos.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'lbl_User'),
            'password' => Yii::t('backend', 'lbl_Pass')
        ];
    }
}
