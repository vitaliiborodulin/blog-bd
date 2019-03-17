<h1>Вы вошли как <em><?= $user ?></em></h1>
<p style="color: blueviolet">
    <small><?= $msg ?></small>
</p>
<? foreach ($messages as $message) : ?>
    <a href="index.php?c=post&id=<?= $message['id_news'] ?>">Новость <?= $message['title'] ?></a>
    <?php if ($isAuth) : ?>
        <a href="index.php?c=edit&id=<?= $message['id_news'] ?>">
            <small style="color: green">Ред.</small>
        </a>
        <a href="index.php?c=delete&id=<?= $message['id_news'] ?>">
            <small style="color: red">Удал.</small>
        </a>
    <? endif; ?>
    <br>
<? endforeach; ?>
<hr>
<? if ($isAuth) : ?>
    <a href="index.php?c=add">Добавить</a><br>
    <a href="index.php?c=login">Выйти</a><br>
<? else : ?>
    <a href="index.php?c=login">Войти</a>
<?php endif; ?>


