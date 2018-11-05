<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $isAdmin boolean */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity_start_timestamp')->input('date', ['min' => date("Y-m-d")]) ?>

    <?= $form->field($model, 'activity_end_timestamp')->input('date', ['min' => date("Y-m-d")]) ?>

    <?php if($isAdmin): ?>

        <?= $form->field($model, 'id_user')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'login'))?>

    <?php endif;?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_important')->checkbox() ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
