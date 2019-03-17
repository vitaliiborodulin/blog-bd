<form class="box" method="post">
    <h1>Login</h1>
    <p><?= $msg; ?></p>
    <p><input type="text" name="user" placeholder="Login"></p>
    <p><input type="password" name="password" placeholder="Password"></p>
    <p><input type="checkbox" name="remember"> Запомнить </p>
    <input type="submit" value="Login">
    <hr>
    <a href="index.php">На главную</a>
</form>