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

//include 'includes/header.php';
?>

    <main>
        <h1>Регистрация</h1>

        <form action="registration.php" method="post">
            <div>
                <label for="username_field">Username:</label>
                <input type="text" id="username_field" name="username" >
                <?php echo $errors['username']; ?>
            </div>

            <div>
                <label for="email_field">Email:</label>
                <input type="text" id="email_field" name="email" >
                <?php echo $errors['email']; ?>
            </div>

            <div>
                <label for="password_field">Пароль:</label>
                <input type="password" id="password_field" name="password" placeholder="не менее 6 символов">
                <?php echo $errors['password']; ?>
            </div>

            <div>
                <input type="submit" name="submit" value="Зарегистрироваться">
            </div>
        </form>

    </main>

<?php
include 'includes/footer.php';