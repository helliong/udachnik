<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/null.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/products-grid.css">
    <link rel="stylesheet" href="assets/libs/modal/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Удачник</title>
</head>
<body>
<header>
    <div class="container">
        <nav class="nav">
            <a href="index.php"><img src="/assets/img/svg/logo.png" alt="logo" class="logo"></a>
            <a href="#about" id="nav2" class="nav_item" onclick="slowScroll('#about')">Доставка и оплата</a>
            <a href="#advantages" id="nav4" class="nav_item" onclick="slowScroll('#advatages')">Помощь</a>
            <?php if (!$user): ?>
                <div class="header__cart cart" tabindex="0">
                    <div class="cart__text">
                        Корзина
                        <span class="cart__quantity">0</span>
                    </div>
                    <div class="cart-content">
                        <ul class="cart-content__list" data-simplebar>
                        </ul>
                        <div class="cart-content__bottom">
                            <div class="cart-content__fullprice">
                                <span>Итого:</span>
                                <span class="fullprice">300 ₽</span>
                            </div>
                            <button class="cart-content__btn btn" data-graph-path="modal"
                                    data-graph-animation="fadeInUp">Перейти в корзину
                            </button>
                        </div>
                    </div>
                </div>

                <a href="registration.php" class="nav_item">Регистрация</a>
                <a href="login.php" class="nav_item">Авторизация</a>
            <?php else: ?>
                <div class="header__cart cart" tabindex="0">
                    <div class="cart__text">
                        Корзина
                        <span class="cart__quantity">0</span>
                    </div>
                    <div class="cart-content">
                        <ul class="cart-content__list" data-simplebar>
                        </ul>
                        <div class="cart-content__bottom">
                            <div class="cart-content__fullprice">
                                <span>Итого:</span>
                                <span class="fullprice">300 ₽</span>
                            </div>
                            <button class="cart-content__btn btn" data-graph-path="modal"
                                    data-graph-animation="fadeInUp">Перейти в корзину
                            </button>
                        </div>
                    </div>
                </div>
                <a href="logout.php" class="nav_item">Выход (<?= $user['email']; ?>)</a>
            <?php endif; ?>

        </nav>
    </div>
</header>