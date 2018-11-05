<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Update Activity: ' . $model->id_activity;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_activity, 'url' => ['view', 'id' => $model->id_activity]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $isAdmin = (Yii::$app->user->identity->login === 'admin');?>

    <?= $this->render('_form', [
        'model' => $model,
        'isAdmin' => $isAdmin
    ]) ?>

</div>
