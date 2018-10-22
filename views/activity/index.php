<?php
    use yii\helpers\Html;
?>
<h1>Активность: <?=$model->title; ?></h1>

<?php if($model->startDay == $model->endDay): ?>
    <p>Событие на <?=date("d.m.Y", $model->startDay)?></p>
<?php else: ?>
    <p>Событие c <?=date("d.m.Y", $model->startDay)?> по <?=date("d.m.Y", $model->endDay)?></p>
<?php endif; ?>

<?php if($model->isImportant): ?>
    <b>Тип события: важное</b>
<?php endif; ?>

<?php if($model->place): ?>
    <h3><?=$model->getAttributeLabel('place') ?></h3>
    <p><?=$model->place?></p>
<?php endif; ?>

<h3><?=$model->getAttributeLabel('body') ?></h3>
<div><?=$model->body ?></div>

<?= Html::a('Добавить событие', '/activity/add', ['class' => 'btn btn-primary btn-lg'])?>
