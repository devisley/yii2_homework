<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Create Activity';
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $isAdmin = (Yii::$app->user->identity->login === 'admin');?>

    <?= $this->render('_form', [
        'model' => $model,
        'isAdmin' => $isAdmin
    ]) ?>

</div>
