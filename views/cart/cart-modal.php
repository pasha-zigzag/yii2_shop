<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th colspan="2">Итого</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img("@web/products/{$item['img']}", ['alt' => $item['name'], 'height' => 50]) ?></td>
                    <td><?= $item['title']?></td>
                    <td><?= round($item['price'])?> руб.</td>
                    <td><?= $item['qty']?> шт.</td>
                    <td><?= round($item['price']) * $item['qty']?> руб.</td>
                    <td><span class="close text-danger del-item" data-id="<?=$id?>">×</span></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="4">Итого: </td>
                <td colspan="2"><span id="cart-qty"><?= $_SESSION['cart.qty']?></span> шт.</td>
            </tr>
            <tr>
                <td colspan="4">На сумму: </td>
                <td colspan="2" id="cart-sum"><?= $_SESSION['cart.sum']?> руб.</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
    <span id="cart-qty" style="display: none"><?= $_SESSION['cart.qty']?></span>
<?php endif;?>