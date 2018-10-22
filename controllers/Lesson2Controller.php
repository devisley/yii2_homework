<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 18.10.2018
 * Time: 20:41
 */

namespace app\controllers;

use app\models\ReviewForm;

class Lesson2Controller extends MyController
{
    public function actionIndex() {
        $time = time();
        return $this->render('index', ['time' => $time]);
    }

    public function actionReview() {
        $model = new ReviewForm();

        return $this->render('review', ['model' => $model]);
    }
}