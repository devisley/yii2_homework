<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 16:22
 */

namespace app\controllers;
use app\models\Calendar;

class CalendarController extends MyController
{
    public function actionIndex($shift)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

        $activities = Calendar::getMonthActivities($shift);
        $monthName = Calendar::$monthName;

        $params = [
            'activities' => $activities,
            'monthName' => $monthName,
        ];

        return $this->render('index', [
            'params' => $params,
            'shift' => $shift
        ]);
    }
}