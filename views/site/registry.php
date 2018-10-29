<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="lesson3">
    <?php
    $form = ActiveForm::begin([]);
    ?>

    <?= $form->field($model, 'name')->textInput()?>
    <?= $form->field($model, 'login')->textInput()?>
    <?= $form->field($model, 'password')->input('password')?>
    <?= $form->field($model, 'passwordRepeat')->input('password')?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
    </div>

    <?php
    ActiveForm::end();
    ?>
</div>
