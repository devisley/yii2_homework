<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 21.10.2018
 * Time: 17:01
 */

namespace app\controllers;

use app\models\Day;
use app\models\Activity;


class CalendarDayController extends MyController
{
    public function actionIndex() {

        $dayValues = [
            'day' => time(),
            'isHoliday' => false
        ];

        $day = new Day($dayValues);

        $event1 = new Activity();

        $values1 = [
            'title' => 'Тестовое событие 1',
            'startDay' => time() + (0.5 * 60 * 60),
            'endDay' => time() + (1 * 60 * 60),
            'idAuthor' => 12345,
            'place' => 'GeekBrains',
            'isImportant' => false,
            'body' => 'Тестовое событие №1 для урока №3 по фреймворку YII2 от GeekBrains.'
        ];

        $event1->setAttributes($values1, false);

        $day->addActivity($event1);

        $event2 = new Activity();

        $values2 = [
            'title' => 'Тестовое событие 2',
            'startDay' => time() + (3.5 * 60 * 60),
            'endDay' => time() + (5 * 60 * 60),
            'idAuthor' => 12345,
            'place' => 'GeekBrains',
            'isImportant' => true,
            'body' => 'Тестовое событие №2 для урока №3 по фреймворку YII2 от GeekBrains.'
        ];

        $event2->setAttributes($values2, false);

        $day->addActivity($event2);


        return $this->render('index', ['model' => $day]);
    }

}