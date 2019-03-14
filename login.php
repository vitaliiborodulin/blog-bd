<?php

session_start();

//сбросили сессию
if (isset($_SESSION)) {
    unset($_SESSION['isAuth']);
}
//сбросили куки
if (isset($_COOKIE['login'])) {
    setcookie('login', '', 1, '/');
}

if (isset($_COOKIE['password'])) {
    setcookie('password', '', 1, '/');
}

if (count($_POST) > 0) {

    if ($_POST['user'] == 'admin' && $_POST['password'] == 'qwerty') {

        $_SESSION['isAuth'] = true;

        //Ставим куки, если человек нажал галочку запомнить
        if (isset($_POST['remember'])) {
            setcookie('login', hash('sha256', 'login'), time() + 3600 * 7 * 24, '/');
            setcookie('password', hash('sha256', 'qwerty'), time() + 3600 * 7 * 24, '/');
        }

        header('Location:index.php');

    } else {
        $msg = 'Неверный логин или пароль';
    }

} else {
    $msg = 'Введите логин и пароль';
}

?>

<form class="box" method="post">
    <h1>Login</h1>
    <p><?php echo $msg; ?></p>
    <p><input type="text" name="user"></p>
    <p><input type="password" name="password"></p>
    <p><input type="checkbox" name="remember"> Запомнить </p>
    <input type="submit" value="Login">
    <hr>
    <a href="index.php">На главную</a>
</form>
