<?php
include 'includes/core.php';


$post=getPost($_GET['id']);
if(checkAccess($post)){
    @unlink('upload/'. $post ['image_path']);
    $db->query('DELETE FROM posts WHERE id='.$post['id']);
}
redirect('index.php');
?>