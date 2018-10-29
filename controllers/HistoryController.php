<?php
/**
 * Created by PhpStorm.
 * UserFirst: Ruslan
 * Date: 20.10.2018
 * Time: 21:33
 */

namespace app\controllers;

use yii\web\Controller;

class HistoryController extends Controller
{
    public function actionIndex() {

        return $this->render('index', ['history' => array_reverse(\Yii::$app->session->get('history'))]);
    }
}