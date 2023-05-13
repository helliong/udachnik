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
    <nav>
        <a href="index.php" id="nav1">Главная</a>
        <a href="" id="nav2" >Все товары</a>
        <a href="" id="nav3" >Контакты</a>
        <?php if (!$user): ?>
            <a href="registration.php">Регистрация</a>
            <a href="login.php">Авторизация</a>
        <?php else: ?>
            <a href="logout.php">Выход (<?= $user['email']; ?>)</a>
        <?php endif; ?>
    </nav>
</header>