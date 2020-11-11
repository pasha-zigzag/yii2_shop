<div class="col-md-6 col-lg-4 <?php if(isset($isMain)) {echo 'col-xl-3';} ?>">
    <div class="card text-center card-product">
        <div class="card-product__img">
            <?= \yii\helpers\Html::img(
                "@web/products/{$product->img}",
                [
                    'class' => 'card-img',
                    'alt' => $product->title
                ]
            ) ?>
            <ul class="card-product__imgOverlay">
                <li>
                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" >
                        <i class="ti-search"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?=$product->id?>" class="add-to-cart">
                        <i class="ti-shopping-cart"></i>
                    </a>
                </li>
                <li><button><i class="ti-heart"></i></button></li>
            </ul>
        </div>
        <div class="card-body">
            <p><?= $product->category->title ?></p>
            <h4 class="card-product__title">
                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->title ?></a>
            </h4>
            <p class="card-product__price"><?= round($product->price) ?> руб.</p>
        </div>
    </div>
</div>