<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 16:00
 */

namespace app\models;
use Yii;
use app\models\Activity;
use yii\base\Model;
use app\models\Day;

class Calendar extends Model
{
    public static $monthName = '';

    /**
     * Возвращает активности за выбранный месяц
     *
     * @param int $shift Сдвиг в месяцах относительно текущего
     * @return array Массив событй за месяц
     */
    public static function getMonthActivities($shift = 0) {
        $daysInMonth = static::daysInMonth($shift);
        $date = static::getShiftDateTimestamp($shift);

        static::$monthName = date('F, Y', $date);

        $month = date('m', $date);
        $year = date('Y', $date);
        $days = [];

        for($i = 1; $i <= $daysInMonth; $i ++) {

            $time = mktime(0,0,0, $month, $i, $year);
            $day = new Day(['timestamp' => $time]);

            $day->activities = Activity::find()
                ->where('id_user = :id and :time >= activity_start_timestamp  and :time <= activity_end_timestamp ',
                    [':time' => $time, ':id' =>  Yii::$app->user->identity->id_user])
                ->asArray()->all();

            $days[$i] = $day;
        }

        return $days;
    }

    public static function daysInMonth($shift) {
        $date = static::getShiftDateTimestamp($shift);

        $daysInMonth = date('t', $date);

        return $daysInMonth;
    }

    private static function getShiftDateTimestamp($shift) {
        $date = new \DateTime();
        $date->modify($shift . ' month')->format('M');

        return $date->getTimestamp();
    }

}