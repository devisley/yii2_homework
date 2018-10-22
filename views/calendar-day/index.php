<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 21.10.2018
 * Time: 17:31
 */
use yii\bootstrap\Html;
?>
<div class="text-right">
    <?= Html::a('Вернуться в календарь', '/calendar', ['class' => 'btn btn-primary btn-lg'])?>
</div>
<h1 class="text-primary text-center">Список событий на <?=date("d.m.Y", $model->day)?>, <?=$model->dayName?></h1>

<?php if(count($model->activities)): ?>
<div class="event-box">
    <?php foreach ($model->activities as $item) {?>
            <article class="event-box__item table-bordered">
                <h2 class="bg-info"><?= $item->title; ?> <small class="text-danger"><?php if ($item->isImportant) echo 'Важное';?></small></h2>
                <h4 class="bg-success">Начало события: <?= date("Y-m-d H:i:s", $item->startDay) ?></h4>
                <h4 class="bg-success">Завершение события: <?= date("Y-m-d H:i:s", $item->endDay) ?></h4>
                <h4 class="bg-success">Место: <?= $item->place ?></h4>
                <p><?= $item->body?> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad distinctio dolorum excepturi fuga, impedit iure labore modi molestias nam nemo nulla odit quo quod repudiandae saepe ut veniam. Expedita, sunt.</p>
                <?= Html::a('Редактировать', '/calendar-day/edit', ['class' => 'btn btn-primary btn-lg btn-block'])?>
            </article>
    <?php }?>

</div>
<?php else: ?>
    <p>Список событий пуст</p>
<?php endif; ?>