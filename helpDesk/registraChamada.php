<?php
    session_start();

    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $desc = str_replace('#', '-', $_POST['desc']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $desc . PHP_EOL;    

    $arquivo = fopen('db.txt', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);

    header('Location: abrir_chamado.php');
?>