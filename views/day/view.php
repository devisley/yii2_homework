<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 04.11.2018
 * Time: 22:08
 */

use yii\helpers\Html;
use yii\widgets\ListView;
?>

<h2>Список событий на <?= Html::encode($date) ?></h2>

<?php

echo ListView::widget([
   'dataProvider' => $dataProvider,
    'itemView' => 'event'
]);

?>
