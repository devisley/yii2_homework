<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
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
     * События назначенные на текущий день
     *
     * @var array
     */
    public $activities = [];

    /**
     * Возврашает имя дня недели
     *
     * @return string Полное наименование дня недели
     */
    public function getDayName() {
        return date("l", $this->day);
    }

    /**
     * Добавляет новое событие
     *
     * @param Activity $activity Объект типа Activity
     */
    public function addActivity(Activity $activity) {

    }

    /**
     * Удаляет событие
     *
     * @param string $title Описание события
     */
    public function deleteActivity($title) {

    }

    /**
     * Получить события
     *
     * @return array Массив событий текущего дня
     */
    public function getActivities() {
        return $this->activities;
    }

}