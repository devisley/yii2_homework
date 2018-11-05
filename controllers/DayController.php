<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 22:02
 */

namespace app\controllers;


use yii\data\ActiveDataProvider;
use app\models\Activity;

class DayController extends MyController
{
    public function actionView($date)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Activity::find()
                ->where('id_user = :id and :time >= activity_start_timestamp  and :time <= activity_end_timestamp ',
                    [':time' => $date, ':id' =>  \Yii::$app->user->identity->id_user])
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'date' => date('d.m.Y', $date)
        ]);
    }

}