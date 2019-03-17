<? if ($err404) : ?>
    404
<? else : ?>

    <form method="post">
        <p><label>
                Заголовок <br>
                <input type="text" name="title" value="<?= $message['title']; ?>">
            </label>
        </p>
        <p><label>
                Текст <br>
                <textarea name="content" cols="30" rows="10"><?= $message['content']; ?></textarea>
            </label>
        </p>
        <p>
            <input type="submit" value="Сохранить">
        </p>
    </form>
    <div class="message">
        <?= $msg; ?>
    </div>
<? endif; ?>
<hr>
<a href="index.php">На главную</a>