<?php
    use yii\helpers\Html;
?>
<h3 class="text-success">Событие добавлено!</h3>
<h2>Тема: <?=$model->title; ?></h2>

<?php if($model->startDay == $model->endDay): ?>
    <p>Событие на <?=$model->startDay?></p>
<?php else: ?>
    <p>Событие c <?=$model->startDay?> по <?=$model->endDay?></p>
<?php endif; ?>

<?php if($model->isImportant): ?>
    <b>Тип события: важное</b>
<?php endif; ?>

<?php if($model->place): ?>
    <h3><?=$model->getAttributeLabel('place') ?></h3>
    <p><?=$model->place?></p>
<?php endif; ?>

<?php if($model->body): ?>
    <h3><?=$model->getAttributeLabel('body') ?></h3>
    <div><?=$model->body ?></div>
<?php endif; ?>


<br><br><?= Html::a('Добавить событие', '/activity/add', ['class' => 'btn btn-primary btn-lg'])?>
