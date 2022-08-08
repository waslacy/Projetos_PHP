<?php
    $title = $_POST['title'];
    $text = $_POST['text'];

    $msg = $title . '¨' . $text . PHP_EOL;

    $arquivo = fopen('db.txt', 'a');
    fwrite($arquivo, $msg);
    fclose($arquivo);

    header('Location: index.php');
?>