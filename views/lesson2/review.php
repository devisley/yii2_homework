<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="lesson2">
    <?php
        $form = ActiveForm::begin([]);
    ?>

    <?= $form->field($model, 'title')->textInput()?>
    <?= $form->field($model, 'content')->textArea()?>
    <?= $form->field($model, 'email')->textInput(['type' => 'email'])?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
    </div>

    <?php
        ActiveForm::end();
    ?>
</div>
