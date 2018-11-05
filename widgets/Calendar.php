<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 18:47
 */

namespace app\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class Calendar extends Widget
{
    public $params;

    public function run() {
        echo '<h2>' . Html::encode($this->params['monthName']) .'</h2>';
        echo Html::beginTag('div', ['class' => 'calendar']);
        foreach ($this->params['activities'] as $key => $day) {

            echo $this->render('day', [
                'day' => $key,
                'count' => count($day->activities),
                'date' => $day->timestamp,
                'name' => $day->dayName,
            ]);
        }
        echo Html::endTag('div');
    }
}