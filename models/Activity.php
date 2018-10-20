<?php

namespace app\models;

use yii\base\Model;

/**
 * Activity класс
 *
 * Отражает сущность хранимого в календаре события
 */
class Activity extends Model
{
    /**
     * Название события
     *
     * @var string
     */
    public $title;

    /**
     * День начала события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $startDay;

    /**
     * День завершения события. Хранится в Unix timestamp
     *
     * @var int
     */
    public $endDay;

    /**
     * ID автора, создавшего события
     *
     * @var int
     */
    public $idAuthor;

    /**
     * Место где запланировано событие
     *
     * @var string
     */
    public $place;

    /**
     * Важное событие
     *
     * @var bool
     */
    public $isImportant;

    /**
     * Описание события
     *
     * @var string
     */
    public $body;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события',
            'place' => 'Место события',
            'isImportant' => 'Важное событие',
        ];
    }
}
