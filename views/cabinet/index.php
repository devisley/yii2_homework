<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="cabinet">
    <h1>Добро пожаловать в личный кабинет!</h1>
    <div>
        <span>Имя: <b><?= Yii::$app->user->identity->name?></b></span>
    </div>
    <div>
        <span>Логин (email): <b><?= Yii::$app->user->identity->login?></b></span>
    </div>
    <div>
        <span>Последнее посещение: <b><?= Yii::$app->user->identity->last_access?></b></span>
    </div>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Редактировать профиль
    </a>
    <div class="collapse" id="collapseExample">
        <div class="card card-block">
            <?php
            $form = ActiveForm::begin([]);
            ?>

            <?= $form->field($model, 'name')->textInput(['value' => Yii::$app->user->identity->name])?>
            <?= $form->field($model, 'login')->textInput(['value' => Yii::$app->user->identity->login])?>
            <?= $form->field($model, 'password')->input('password')?>
            <?= $form->field($model, 'passwordRepeat')->input('password')?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
            </div>

            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>
