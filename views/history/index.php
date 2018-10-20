<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 20.10.2018
 * Time: 21:55
 */
?>

<h4>История посещений: </h4>
<ul>
    <?php if(count($history)): ?>

    <?php foreach ($history as $item) {?>
        <li><?= $item; ?></li>
    <?php }?>

    <?php endif; ?>
</ul>
