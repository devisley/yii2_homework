<?php
/**
 * @var $time string
 */
?>

<h1> HI!!!! YI!!!!</h1>

<p>Time: <?= $time ?></p>

<hr>

<?= $this->context->renderPartial('part'); ?>

<?= Yii::$app->view->renderFile('@app/views/parts/part2.php'); ?>

<h2>Алиасы</h2>

<?php
Yii::setAlias('@test', 'C:\OpenServer');
?>

<ul>
    <li>@app: <?= Yii::getAlias('@app'); ?></li>
    <li>@yii: <?= Yii::getAlias('@yii'); ?></li>
    <li>@runtime: <?= Yii::getAlias('@runtime'); ?></li>
    <li>@vendor: <?= Yii::getAlias('@vendor'); ?></li>
    <li>@webroot: <?= Yii::getAlias('@webroot'); ?></li>
    <li>@test: <?= Yii::getAlias('@test'); ?></li>
</ul>
