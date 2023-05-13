<?php
include 'includes/core.php';

$product=getProduct($_GET['id']);
if (!$product){
    redirect('index.php');
}


$product=productPrepare ($product, false);
include 'includes/head.php';
?>
<div class="container">
    <h3 class="block_name" id="product">Товар</h3>
    <article class="product">
        <img src="upload/<?= $product['image_path']; ?>" alt="Изображение товара" class="product_img">
        <p class="product_price"><?= $product['price'];?></p>
        <p class="product_title"><?= $product['title'];?>₽</p>
        <a href="#" class="product_btn">Купить</a>
    </article>
</div>