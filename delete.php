<?php

session_start();
include_once('functions.php');

if (!isAuth()) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'] ?? null;
$err404 = false;

if (!check_id($id)) {
    $err404 = true;
} else {
    $query = db_query("DELETE FROM news WHERE id_news=:id", ['id' => $id]);

    header('Location: index.php?msg=delOk');
    exit();
}


?>

<?php if ($err404) { ?>
    404
<?php } ?>
