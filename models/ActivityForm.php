<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 22.10.2018
 * Time: 19:12
 */

namespace app\models;


use yii\base\Model;

class ActivityForm extends Model
{
    public $title;
    public $startDay;
    public $endDay;
    public $place;
    public $isImportant;
    public $body;
    public $files;

    public function rules()
    {
        return [
            [['title', 'startDay', 'endDay'], 'required'],
            [['title', 'place'], 'string', 'min' => 3],
            [['body'], 'string', 'min' => 3, 'max' => 250],
            [['isImportant'], 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => false],
            ['endDay', 'compare', 'compareAttribute' => 'startDay', 'operator' => '>='],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'body' => 'Описание',
            'place' => 'Место',
            'isImportant' => 'Важное',
            'files' => 'Добавить вложения',
        ];
    }

}