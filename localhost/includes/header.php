<?php

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Удачник</title>
</head>
<body>
<header>
    <img src="" alt="">
    <nav>
        <a href="index.php">Главная</a>
        <?php
        //if(!$user){
        //    ?>
        <!--    <a href="registration.php">Регистрация</a>-->
        <!--    <a href="login.php">Авторизация</a>-->
        <!--        <?php
        //} else {
        //    ?>-->
        <!--    <a href="create.php">Создать пост</a>-->
        <!--    <a href="">Мои посты</a>-->
        <!--    <a href="logout.php">Выход (--><? //= $user['email']; ?><!--)</a>-->
        <!--    --><?php
        //}
        //?>

        <?php if (!$user): ?>
            <a href="registration.php">Регистрация</a>
            <a href="login.php">Авторизация</a>
        <?php else: ?>
            <a href="create.php">Создать пост</a>
            <a href="">Мои посты</a>
            <a href="logout.php">Выход (<?= $user['email']; ?>)</a>
        <?php endif; ?>
    </nav>
</header>