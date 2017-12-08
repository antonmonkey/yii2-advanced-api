<?php

/* @var $this yii\web\View */

$this->title = 'Купи-продай';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Товары</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach($model as $product) : ?>

            <div class="col-md-12">
                <h2><?=$product['title'];?></h2>
                <p><?=$product['content'];?></p>
                <p>Price <?=$product['description'];?></p>
            </div>

            <?php endforeach; ?>

        </div>

    </div>
</div>
