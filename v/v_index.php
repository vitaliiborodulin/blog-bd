<h1>Вы вошли как <em><?= $user ?></em></h1>
<p style="color: blueviolet">
    <small><?= $msg ?></small>
</p>
<? foreach ($messages as $message) : ?>
    <a href="post.php?id=<?= $message['id_news'] ?>">Новость <?= $message['title'] ?></a>
    <?php if ($isAuth) : ?>
        <a href="edit.php?id=<?= $message['id_news'] ?>">
            <small style="color: green">Ред.</small>
        </a>
        <a href="delete.php?id=<?= $message['id_news'] ?>">
            <small style="color: red">Удал.</small>
        </a>
    <? endif; ?>
    <br>
<? endforeach; ?>
<hr>
<? if ($isAuth) : ?>
    <a href="add.php">Добавить</a><br>
    <a href="login.php">Выйти</a><br>
<? else : ?>
    <a href="login.php">Войти</a>
<?php endif; ?>


