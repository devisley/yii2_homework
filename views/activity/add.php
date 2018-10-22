<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="lesson3">
    <?php
    $form = ActiveForm::begin([]);
    ?>

    <?= $form->field($model, 'title')->textInput()?>
    <?= $form->field($model, 'startDay')->input('date', ['min' => date("Y-m-d")])?>
    <?= $form->field($model, 'endDay')->input('date', ['min' => date("Y-m-d")])?>
    <?= $form->field($model, 'place')->textInput()?>
    <?= $form->field($model, 'isImportant')->checkbox(['value'=>true])?>
    <?= $form->field($model, 'body')->textArea()?>
    <?= $form->field($model, 'files')->fileInput(['multiple'=>true])?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
    </div>

    <?php
    ActiveForm::end();
    ?>
</div>
