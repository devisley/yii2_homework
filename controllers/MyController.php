<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 20.10.2018
 * Time: 21:46
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class MyController extends Controller
{

    public function render($view, $params = [])
    {
        if (Yii::$app->user->identity->login === 'admin') {
            Yii::$app->setLayoutPath('@admin_module/views/layouts');
        }

        $content = $this->getView()->render($view, $params, $this);
        $history = \Yii::$app->session->get('history');
        if (!isset($history)) {
            $history = [];
        }

        array_push($history, \Yii::$app->request->url);
        \Yii::$app->session->set('history', $history);

        return $this->renderContent($content);
    }

}