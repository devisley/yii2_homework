<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 20.10.2018
 * Time: 20:25
 */

namespace app\controllers;


use app\models\Activity;
use app\models\ActivityForm;

class ActivityController extends MyController
{
    public function actionIndex() {
        $model = new Activity();

        $values = [
            'title' => 'Тестовая активность',
            'startDay' => time() + (2 * 24 * 60 * 60),
            'endDay' => time() + (7 * 24 * 60 * 60),
            'idAuthor' => 12345,
            'place' => 'GeekBrains',
            'isImportant' => true,
            'body' => 'Тестовое событие для урока №2 по фреймворку YII2 от GeekBrains.'
        ];

        $model->setAttributes($values, false);

        return $this->render('index', ['model' => $model]);
    }


    public function actionAdd() {
        $model = new ActivityForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                return $this->render('submit', ['model' => $model]);
            }
        }

        return $this->render('add', ['model' => $model]);
    }
}