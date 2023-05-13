<?php
$forAuth=true;
include 'includes/core.php';

if (isset($_POST['submit'])) {
    $price = trim($_POST['price']);
    $title = trim($_POST['title']);
    $image = $_FILES['image'];

    $errors = productValidation($price, $title, $image, false);

    if (count($errors) === 0) {

       $imageName = $image['name'];
       $image_temp=$image['tmp_name'];//временная папка
       $image_path=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$imageName;

        move_uploaded_file($image_temp, $image_path);
            $prepared = $db->prepare('INSERT INTO products (price, title, image_path) VALUES (:price, :title, :image_path)');
            $prepared->execute([
                'price' => $price,
                'title' => $title,
                'image_path' => $imageName,
            ]);
            redirect('index.php');
    }
}


include 'includes/head.php';
?>
<div class="container">
    <main>
        <h2 class="block_name_reg" >Создать пост</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="product-price" class="form_label">Цена товара:</label>
                <input type="text" name="price" id="product-price" class="form_input">
                <?= $errors['price']; ?>
            </div>
            <div>
                <label for="product-title" class="form_label">Название товара:</label>
                <input type="text" name="title" id="product-title" class="form_input">
                <?= $errors['title']; ?>
            </div>
            <div>
                <label for="product-image" class="form_label">Изображение к посту:</label>
                <input type="file" name="image" id="product-image">
                <?= $errors['image']; ?>
            </div>
            <div>
                <input type="submit" value="Создать пост" name="submit" class="reg_btn">
            </div>
        </form>
    </main>
</div>