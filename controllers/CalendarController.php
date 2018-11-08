<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 16:22
 */

namespace app\controllers;
use app\models\Calendar;
use yii\filters\AccessControl;

class CalendarController extends MyController
{
    public function actionIndex($shift)
    {
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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin', 'simple'],
                    ],
                ],
            ],

        ];
    }
}