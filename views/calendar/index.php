<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 16:23
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="calendar-box">
    <a class="left carousel-control" href="<?= Url::toRoute(['/calendar', 'shift' => Html::encode($shift - 1)])?>" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>

    <?= \app\widgets\Calendar::widget(['params' => $params]) ?>

    <a class="right carousel-control" href="<?= Url::toRoute(['/calendar', 'shift' => Html::encode($shift + 1)])?>" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
