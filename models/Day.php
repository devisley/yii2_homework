<?php
/**
 * Created by PhpStorm.
 * UserFirst: Ruslan
 * Date: 20.10.2018
 * Time: 20:59
 */

namespace app\models;
use yii\base\Model;

class Day extends Model
{
    /**
     * Хранится в Unix timestamp
     *
     * @var int
     */
    public $day;

    /**
     * Выходной день
     *
     * @var bool
     */
    public $isWeekend;

    /**
     * Праздничный день
     *
     * @var bool
     */
    public $isHoliday;

    /**
     * Русское название дня недели
     *
     * @var bool
     */
    public $dayName;

    /**
     * События назначенные на текущий день
     *
     * @var array
     */
    public $activities = [];

    public function __construct($values, array $config = [])
    {
        parent::__construct($config);
        $this->setAttributes($values, false);
        $this->isWeekend = self::isWeekend($this->day);
        $this->dayName = $this->getDayName();
    }

    /**
     * Возврашает полное имя дня недели на русском
     *
     * @return string Полное имя дня недели на русском
     */
    private function getDayName() {
        $name = date("l", $this->day);

        $days = [
            'Sunday' => 'Воскресенье',
            'Monday' => 'Понедельник',
            'Tuesday' => 'Вторник',
            'Wednesday' => 'Среда',
            'Thursday' => 'Четверг',
            'Friday' => 'Пятница',
            'Saturday' => 'Суббота',
        ];

        return $days[$name];
    }

    /**
     * Добавляет новое событие
     *
     * @param Activity $activity Объект типа Activity
     */
    public function addActivity(Activity $activity) {
        array_push($this->activities, $activity);
    }

    /**
     * Удаляет событие
     *
     * @param string $title Описание события
     */
    public function deleteActivity($title) {

    }

    /**
     * Функция определяет является ли день выходным
     *
     * @param $day int Текущий день в формате  Unix timestamp
     * @return bool Возвращет истину, если день выходной.
     */
    public static function isWeekend($day) {
        return (date('N', $day) >= 6);
    }

}