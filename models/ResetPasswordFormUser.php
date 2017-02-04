<?php
namespace app\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\User;

/**
 * Password reset form
 */
class ResetPasswordFormUser extends Model
{
    public $password_old;
    public $password;
    public $password2;

    /**
     * @var \common\models\User
     */
    private $_user;

    public function attributeLabels()
    {
        return [
            'password_old' => 'Старый пароль',
            'password' => 'Новый пароль',
            'password2' => 'Повторите пароль',
        ];
    }

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password','password_old'], 'required'],
            ['password2','validateRepeat'],
            ['password', 'string', 'min' => 6],
            ['password_old', 'validatePassword'],
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
            if (!$this->_user->validatePassword($this->password_old)) {
                $this->addError($attribute, 'Неправильный введен пароль');
            }
    } 


    public function validateRepeat($attribute, $params)
    {
            if (!($this->password == $this->password2)) {
                $this->addError($attribute, 'Пароли не совпадают');
            }
    } 

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save(false);
    }
}
