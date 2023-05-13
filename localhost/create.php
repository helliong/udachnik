<?php
$forAuth=true;
include 'includes/core.php';

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $intro = trim($_POST['intro']);
    $content = trim($_POST['content']);
    $image = $_FILES['image'];

    $errors = postValidation($title, $intro, $content, $image, false);

    if (count($errors) === 0) {

       $imageName = $image['name'];
       $image_temp=$image['tmp_name'];//временная папка
       $image_path=$_SERVER['DOCUMENT_ROOT'].'/upload/'.$imageName;

        move_uploaded_file($image_temp, $image_path);
            $prepared = $db->prepare('INSERT INTO posts (title, intro, content, image_path, author_id) VALUES (:title, :intro, :content, :image_path, :author_id)');
            $prepared->execute([
                'title' => $title,
                'intro' => $intro,
                'content' => $content,
                'image_path' => $imageName,
                'author_id' => $user['id'],
            ]);
            redirect('index.php');

    }
}
//кодировка
include 'includes/header.php';
?>


    <main>
        <h2>Создать пост</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="post-title">Название поста:</label>
                <input type="text" name="title" id="post-title">
                <?= $errors['title']; ?>
            </div>
            <div>
                <label for="post-intro">Анонс поста:</label>
                <input type="text" name="intro" id="post-intro">
                <?= $errors['intro']; ?>
            </div>
            <div>
                <label for="post-content">Содержание поста:</label>
                <textarea name="content" id="post-content"></textarea>
                <?= $errors['content']; ?>

            </div>
            <div>
                <label for="post-image">Изображение к посту:</label>
                <input type="file" name="image" id="post-image">
                <?= $errors['image']; ?>
            </div>
            <div>
                <input type="submit" value="Создать пост" name="submit">
            </div>

        </form>
    </main>

<?php

include 'includes/footer.php';