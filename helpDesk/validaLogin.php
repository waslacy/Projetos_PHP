<?php
    session_start();

    $auth = false;
    $perfis = array(1 => 'adm', 2 => 'user');
    $usuarios = array(
        array('id' => '1', 'email' => 'adm@gmail.com', 'senha' => 'teste', 'perfil' => 1),
        array('id' => '2', 'email' => 'teste@gmail.com', 'senha' => 'teste', 'perfil' => 2),
        array('id' => '3', 'email' => 'teste2@gmail.com', 'senha' => 'teste', 'perfil' => 2)
    );
    $userId = null;
    $userPerfil = null;

    foreach($usuarios as $user){
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']){
            $auth = true;
            $userId = $user['id'];
            $userPerfil = $user['perfil'];
        }
    }

    if($auth){
        $_SESSION['auth'] = 'y';
        $_SESSION['id'] = $userId;
        $_SESSION['perfil'] = $userPerfil;
        header('Location: home.php');
    } else {
        $_SESSION['auth'] = 'n';
        header('Location: index.php?auth=fail');
    }

?>