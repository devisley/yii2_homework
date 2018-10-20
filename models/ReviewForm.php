<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 18.10.2018
 * Time: 20:51
 */

namespace app\models;


use yii\base\Model;

class ReviewForm extends Model
{
    public $title = 'Название отзыва';
    public $content;
    public $email;

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content', 'email'], 'string'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Нахвание отзыва',
            'content' => 'Текст отзыва',
            'email' => 'Адрес электронной почты',
        ];
    }


}