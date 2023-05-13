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

function getPost($id)
{
    global $db;
    $prepared = $db->prepare("SELECT * FROM posts WHERE id=?");
    $prepared->execute([$id]);
    $post = $prepared->fetch();
    return $post;
}

function getComments ($id){
    global $db;
    $query=$db->query("SELECT * FROM comments WHERE post_id=$id ORDER BY date DESC");
    return array_map(function ($comment){
        $comment ['user']=getUser($comment ['author_id']);
        $comment ['text']=htmlspecialchars($comment['text']);
        $comment['date'] = date('d.m.Y H:i', strtotime($comment['date']));
        return $comment;
    } ,$query->fetchAll());
}


/**
 * Подготовка полей поста
 * @param $post
 * @return mixed
 */
function postPrepare($post, $withComments=false)
{
    $post['title'] = htmlspecialchars($post['title']);
    $post['intro'] = htmlspecialchars($post['intro']);
    $post['content'] = htmlspecialchars($post['content']);
    $post['date'] = date('d.m.Y H:i', strtotime($post['date']));
    $post['user'] = getUser($post['author_id']);

    if($withComments){
        $post['comments'] = getComments($post ['id']);
    }
    return $post;
}

/**
 * Функция проверки полей поста
 * @param $title
 * @param $intro
 * @param $content
 * @param $image
 * @return array
 */
function postValidation($title, $intro, $content, $image, $isUpdate=false)
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

    $titleLength = mb_strlen($title);
    if ($titleLength > 50 or $titleLength === 0) {
        $errors['title'] = "Некорректная длина Названия поста";
    }

    $introLength = mb_strlen($intro);
    if ($introLength > 500 or $introLength === 0) {
        $errors['intro'] = "Некорректная длина Анонса поста";
    }

    $contentLength = mb_strlen($content);
    if ($contentLength === 0) {
        $errors['content'] = "Поле обязательно для заполнения";
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


function checkAccess($post){
    global $user;
    return $post && $user && ($post['author_id']===$user ['id']);

}

