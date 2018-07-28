<?php

use yii\widgets\LinkPager;

?>

<h1>Pessoas</h1>
<hr>

<ul>
    <?php foreach($pessoas as $pessoa): ?>
        <li>
            <?= $pessoa->nome.' - '.$pessoa->email?>
            <small><?= $pessoa->cidade .'('.$pessoa->estado.')'?> </small>
        </li>
    <?php endforeach; ?>
    
</ul>

<?php
    echo LinkPager::widget(['pagination'=>$pagination]);
?>