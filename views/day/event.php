<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div>
    <h3><?= Html::encode($model->activity_name) ?></h3>
    <p><?= Html::encode($model->body) ?></p>
    <?= Html::a('Посмотреть', Url::toRoute(['activity/view', 'id' => Html::encode($model->id_activity)]), ['class' => 'btn btn-primary btn-lg'])?>
</div>