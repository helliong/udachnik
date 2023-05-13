<?php
include 'includes/core.php';

$post=getPost($_GET['id']);
if (!$post){
    redirect('index.php');
}

$commentError = false;
if(isset($_POST['comment'])&& $user){
    $commentText=trim($_POST['comment']);
    if(!$commentText){
        $commentError=true;
    }
    else {
        $prepared=$db->prepare('INSERT INTO comments(post_id, author_id, text) VALUES 
        (:post_id, :author_id, :text)');
        $prepared->execute([
            'post_id'=>$post['id'],
            'author_id'=>$user['id'],
            'text' =>$commentText
        ]);
    }
}

$post=postPrepare($post, true);
include 'includes/header.php';
?>
<article>

        <h3><?= $post['title'];?></h3>
        <img src="upload/<?=$image ?? $post['image_path']?>" alt="" style="width: 360px"> <br>
        <p><?= $post['user'] ['username'];?>, <?= $post['date'];?> </p>

        <p><?= $post['intro'];?></p>
        <p><?= $post['content'];?></p>

        <a href="edit.php?id=<?= $post['id']; ?>">Редактировать пост</a>
        <a href="">Удалить пост</a>

        <hr>
    </article>

    <h4>Комментарии</h4>
<?php if ($user):?>
    <form action="post.php?id=<?= $post['id'];?>" method="post">
        <label for="add">Добавить комментарий</label>
        <textarea id="add" name="comment">
    </textarea>

        <input type="submit" name="submit" value="Добавить комментарий">
    </form>
<?php endif;