<?php
include 'includes/core.php';

$post=getPost($_GET['id']);

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $intro = trim($_POST['intro']);
    $content = trim($_POST['content']);
    $image = $_FILES['image'];
    $imageName=$post['image_path'];

    $errors = postValidation($title, $intro, $content, $image, true);

    if (count($errors) === 0) {

        if ($image['size']>0) {
            $imageName = uploadImage($image);
        }

        $prepared = $db->prepare('UPDATE posts SET title=:title, 
        intro=:intro, content=:content, 
        image_path=:image_path WHERE id=:post_id');
            $prepared->execute([
                'title' => $title,
                'intro' => $intro,
                'content' => $content,
                'image_path' => $imageName,
                'post_id' => $post['id'],
            ]);
            redirect('post.php?id='.$post['id']);
    }
}

include 'includes/header.php';
?>
<main>
    <h2>Редактирование поста</h2>

    <form action="edit.php?id=<?= $post['id']; ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="post-title">Название поста:</label>
                <input type="text" name="title" id="post-title" >
                value="<?=$title ?? $post['title']?>">
                <?= $errors['title']; ?>
            </div>
            <div>
                <label for="post-intro">Анонс поста:</label>
                <input type="text" name="intro" id="post-intro">
                value="<?=$intro ?? $post['intro']?>">
                <?= $errors['intro']; ?>
            </div>
            <div>
                <label for="post-content">Содержание поста:</label>
                <textarea name="content" id="post-content"><?=$content ?? $post['content']?></textarea>
                <?= $errors['content']; ?>

            </div>
            <div>
                <label for="post-image">Изображение к посту:</label>
                <img src="upload/<?=$image ?? $post['image_path']?>" alt="" style="width: 360px"> <br>
                <input type="file" name="image" id="post-image">
                <?= $errors['image']; ?>
            </div>
            <div>
                <input type="submit" value="Редактировать пост" name="submit">
            </div>

        </form>
</main>
<?php
include 'includes/header.php';
?>