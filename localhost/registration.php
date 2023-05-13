<?php
include 'includes/core.php';

$errors = [];

// если нажата кнопка Зарегистроваться:
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $usernameLength = mb_strlen($username);
    $passwordLength = mb_strlen($password);
//проверяем длину поля username
    if ($usernameLength === 0 || $usernameLength > 50) {
        $errors['username'] = "некорректная длина поля username";
    }

//проверяем соответствует ли введенный пользователем email стандартам записи электронных почт: 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Некорректный формат email";
    } else {
        $prepared = $db->prepare("SELECT * FROM users WHERE email=?");
        $prepared->execute([$email]);
        if ($prepared->fetch()) {
            $errors['email'] = "Такой email уже существует";
        }
    }

//проверяем длину пароля 
    if ($passwordLength < 6) {
        $errors['password'] = "некорректная длина пароля";
    }

    if (count($errors) === 0) {
        $prepared = $db->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");
        $prepared->execute([
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
        ]);
        redirect('login.php');
    }
}

include 'includes/head.php';
?>
<div class="container">
    <main>
        <div class="reg-body">
            <h1 class="block_name_reg">Регистрация</h1>
            <form action="registration.php" method="post">
                <div class="reg_field">
                    <label for="username_field" class="form_label">Имя пользователя:</label>
                    <input type="text" id="username_field" name="username" class="form_input">
                    <?php echo $errors['username']; ?>
                </div>
                <div class="reg-field">
                    <label for="email_field" class="form_label">Email:</label>
                    <input type="text" id="email_field" name="email" class="form_input">
                    <?php echo $errors['email']; ?>
                </div>
                <div class="reg-field">
                    <label for="password_field" class="form_label">Пароль:</label>
                    <input type="password" id="password_field" name="password" placeholder="не менее 6 символов"
                           class="form_input">
                    <?php echo $errors['password']; ?>
                </div>
                <div>
                    <button type="submit" name="submit" value="Зарегистрироваться" class="reg_btn">Зарегестрироваться
                    </button>
                </div>
                <div class="entry-if-yes-acc">
                    <p>Уже есть аккаунт?</p>
                    <a href="login.php" class="entry-items-if-yes-acc">Войти</a>
                </div>
            </form>
        </div>
    </main>
</div>