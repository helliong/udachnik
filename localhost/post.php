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

$post=postPrepare ($post, true);
include 'includes/header.php';
?>

<?php if(checkAccess($post)): ?>
    <a href="edit.php?id=<?= $post['id']; ?>">Редактировать пост</a>
    <a href="remove.php?id=<?= $post['id']; ?>">Удалить пост</a>
<?php endif; ?>

<article>

        <h3><?= $post['title'];?></h3>
        <img src="upload/<?= $post['image_path']; ?>" alt="" width="360px"><br> 
        <p><?= $post['user'] ['username'];?>, <?= $post['date'];?> </p>

        <p><?= $post['intro'];?></p>
        <p><?= $post['content'];?></p>
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

foreach ($post['comments'] as $comment):
?>
<div>
   <p> <?=$comment['user']['username'] .":". $comment['text']; ?></p>
   <p><?= $comment['date'];?> </p>

   <?php if(checkAccess($post) || ($user && $user ['id']===$comment['author_id'])): ?>
        <a href="editComment.php?id=<?= $comment['id']; ?>">Редактировать комментарий</a>
        <a href="removeComment.php?id=<?= $comment['id']; ?>">Удалить комментарий</a>
    <?php endif; ?>
    <hr>
</div>
<?php endforeach; ?>



<?php 
include 'includes/footer.php';
?> 