<h1>Вы вошли как <em><?= $user ?></em></h1>
<p style="color: blueviolet">
    <small><?= $msg ?></small>
</p>
<?php foreach ($messages as $message) : ?>
    <a href="<?=ROOT?>post/<?= $message['id_news'] ?>">Новость <?= $message['title'] ?></a>
    <?php if ($isAuth) : ?>
        <a href="<?=ROOT?>edit/<?= $message['id_news'] ?>">
            <small style="color: green">Ред.</small>
        </a>
        <a href="<?=ROOT?>delete/<?= $message['id_news'] ?>">
            <small style="color: red">Удал.</small>
        </a>
    <? endif; ?>
    <br>
<? endforeach; ?>
<hr>
<?php if ($isAuth) : ?>
    <a href="<?=ROOT?>add">Добавить</a><br>
    <a href="<?=ROOT?>login">Выйти</a><br>
<?php else : ?>
    <a href="<?=ROOT?>login">Войти</a>
<?php endif; ?>


