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

include 'includes/header.php';

?>

    <main>
        <h1>Авторизация</h1>
        <form action="login.php" method="post">
            <div>
                <label for="email-field">Email:</label>
                <input type="email" name="email" id="email-field">



            </div>
            <div>
                <label for="password-field">Пароль:</label>
                <input type="password" name="password" id="password-field">
            </div>
            <div>
                <input type="submit" name="submit" value="Войти">
            </div>
            <?= isset($errors) ? 'Ошибка авторизации, проверьте логин/пароль':'';?>

           <?php
//             if isset($errors){
//                 echo 'Ошибка авторизации, проверьте логин/пароль';
//            }
                           ?>

        </form>
    </main>

<?php
include 'includes/footer.php';