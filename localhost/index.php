<?php
include 'includes/core.php';
include 'includes/header.php';

$query=$db->query('SELECT * FROM posts ORDER BY date DESC');
$posts=$query->fetchAll();

?>
<main>
    <h2>Добро пожаловать, <?php echo $user['username'];?></h2>
    
    <?php
    foreach ($posts as $post):
    $post=postPrepare($post, false);
    ?>
    <article>

        <h3><?= $post['title'];?></h3>
        <img src="upload/<?= $post['image_path'];?>" alt="" style=width: 360px; height: 360px>
        
        <p><?= $post['user'] ['username'];?>, <?= $post['date'];?> </p>

        <p><?= $post['intro'];?></p>
        <a href="post.php?id=<?= $post['id']; ?>">Подробнее...</a>
        <?php if(checkAccess($post)): ?>
        <a href="edit.php?id=<?= $post['id']; ?>">Редактировать пост</a>
        <a href="remove.php?id=<?= $post['id']; ?>">Удалить пост</a>
        <?php endif; ?>
        <hr>
    </article>
</main>


<?php
endforeach;

include 'includes/footer.php';
?>