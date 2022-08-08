<?php
    session_start();

    if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 'y'){
      header('Location: index.php?auth=fail2');
    }
?>