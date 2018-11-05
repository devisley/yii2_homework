<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_activity') ?>

    <?= $form->field($model, 'activity_name') ?>

    <?= $form->field($model, 'activity_start_timestamp') ?>

    <?= $form->field($model, 'activity_end_timestamp') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'is_important') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
