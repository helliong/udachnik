<?php

include 'includes/core.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $prepared = $db->prepare('SELECT * FROM users WHERE email=?');
    $prepared->execute([$email]);

    $user = $prepared->fetch();//строка из БД о пользователе с введённым email

//    $user=[
//      'id':1,
//      'username':"serkova",
//      'email':"dasg@mgvj.ru",
//      'password': "xzg,mdfmjgnf asjvm",
//   ]

    if ($user) {
        if ($user['password'] === md5($password)) {
            $_SESSION['auth_user_id'] = $user['id'];
            redirect('index.php');
        }
    }

    $errors=true;
}

include 'includes/head.php';

?>
<div class="container">
    <main>
        <div class="reg-body">
        <h1 class="block_name_reg" >Авторизация</h1>
        <form action="login.php" method="post">
            <div class="reg_field">
                <label for="email-field" class="form_label">Email:</label>
                <input type="email" name="email" id="email-field" class="form_input">
            </div>
            <div class="reg_field">
                <label for="password-field" class="form_label">Пароль:</label>
                <input type="password" name="password" id="password-field" class="form_input">
            </div>
            <div>
                <button type="submit" name="submit" value="Войти" class="auth_btn">Войти </button>
            </div>
            <div class="reg-if-no-acc">
                <p>Нету аккаунта?</p>
                <a href="registration.php">Зарегестрироваться</a>
            </div>
            <?= isset($errors) ? 'Ошибка авторизации, проверьте логин/пароль':'';?>
        </form>
        </div>
    </main>
</div>