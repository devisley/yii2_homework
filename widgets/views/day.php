<?php
/**
 * @var $day
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="calendar__item">
    <h2><?= Html::encode($day) ?></h2>
    <small><?= Html::encode($name) ?></small>
    <?= Html::a('События: ' . Html::encode($count), Url::toRoute(['day/view', 'date' => Html::encode($date)])) ?>
</div>
