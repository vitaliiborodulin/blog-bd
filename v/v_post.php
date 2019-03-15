<?php if ($err404) { ?>
    404
<?php } else { ?>
    <div>
        <!--        <em>--><?//= $message['dt'] ?><!--</em>-->
        <!--        <strong>--><?//= $message['title'] ?><!--</strong>-->
        <div><?php echo nl2br($message['content']); ?></div>
    </div>
<?php } ?>
<hr>
<a href="index.php">Назад</a>