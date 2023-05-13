<?php
/**
 * Функция перенапраления на другую страницу (редирект)
 * @param $url
 * @return void
 */
function redirect($url){
    header('Location:' . $url);
    exit();
}

/**
 * Функция получения пользователя по id
 * @param $id
 * @return mixed
 */
function getUser($id)
{
    global $db;
    $prepared = $db->prepare("SELECT * FROM users WHERE id=?");
    $prepared->execute([$id]);
    $user = $prepared->fetch();
    if ($user) {
        $user['username'] = htmlspecialchars($user['username']);
    }
    return $user;
}

function getProduct($id)
{
    global $db;
    $prepared = $db->prepare("SELECT * FROM products WHERE id=?");
    $prepared->execute([$id]);
    $product = $prepared->fetch();
    return $product;
}

/**
 * Подготовка полей товара
 * @param $product
 * @return mixed
 */
function productPrepare($product, $withComments)
{
    $product['price'] = htmlspecialchars($product['price']);
    $product['title'] = htmlspecialchars($product['title']);

    // if($withComments){
        // $product['comments'] = getComments($product ['id']);
    // }
     return $product;
}

/**
 * Функция проверки полей товара
 * @param $price
 * @param $title
 * @param $image
 * @return array
 */
function productValidation($price, $title, $image, $isUpdate=false)
{
    $errors = [];

    if (($image['size'] > 5242880) && !$isUpdate) {
        $errors['image'] = "Проверьте размер файла";
    } else if (($image['size']<= 5242880) && ($image['size']>0)){
        $acceptTypes = ['image/jpeg', 'image/png'];
        if (!in_array($image['type'], $acceptTypes)) {
            $errors['image'] = "Неправильный формат файла";
        }
    }

    $priceLength = mb_strlen($price);
    if ($priceLength > 500 or $priceLength === 0) {
        $errors['price'] = "Некорректная длина Цены товара";
    }

    $titleLength = mb_strlen($title);
    if ($titleLength > 50 or $titleLength === 0) {
        $errors['title'] = "Некорректная длина Названия товара";
    }

    return $errors;
}

/**
 * Функция обработки загрузки изображения
 * @param $image
 * @return string
 */
function uploadImage($image)
{
    $imageName = $image['name'];
       $image_temp=$image['tmp_name'];//временная папка
       $image_path=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$imageName;

        move_uploaded_file($image_temp, $image_path);
    return $imageName;
}

function checkAccess($product){
    global $user;
    return $product;
}