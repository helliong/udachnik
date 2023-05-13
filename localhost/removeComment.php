<?php
include 'includes/core.php';

$query=$db->query('SELECT * FROM comments WHERE id=' . intval($_GET['id']));
$comment=$query->fetch();
$post=getPost($comment['post_id']);

if(checkAccess($post) || $user['id']===$comment['author_id']){

    $db->query('DELETE FROM comments WHERE id='.$comment['id']);
}

redirect('post.php?id='.$post['id']);

?>