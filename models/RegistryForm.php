<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 29.10.2018
 * Time: 22:38
 */

namespace app\models;

use yii\base\Model;

class RegistryForm extends Model
{
    public $name;
    public $login;
    public $password;
    public $passwordRepeat;

    public function rules() {
        return [
            [['name', 'login', 'password', 'passwordRepeat'], 'required'],
            [['name', 'login'], 'string', 'min' => 3],
            [['password'], 'string', 'min' => 5],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '=='],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя',
            'login' => 'Логин',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повтор пароля'
        ];
    }

}