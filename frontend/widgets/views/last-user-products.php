<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $product common\models\Post[] */
?>
<div class="last-user-product">
    <?php if (count($product)): ?>
        <p>
            <?= Html::a('See All Products', ['/user-products/index', 'user_id' => $user->id]) ?>
        </p>
        <?php foreach ($product as $prod): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::a(Html::encode($prod->title), ['/user-products/view', 'user_id' => $prod->user_id, 'id' => $prod->id]) ?>
                </div>
                <div class="panel-body">
                    <?= Yii::$app->formatter->asNtext(StringHelper::truncateWords($prod->content, 50)) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nothing found.</p>
    <?php endif; ?>
</div>