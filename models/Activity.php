<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Activity класс
 *
 * Отражает сущность хранимого в календаре события
 */
class Activity extends ActiveRecord
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

    public $files;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'activity';
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
}
