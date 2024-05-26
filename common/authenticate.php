<?php
session_start();

require_once('repositories/token.php');

if(isset($_SESSION['token'])) {
    // El usuario está logueado
    $tokenC = new Token();
    $result = $tokenC -> authenticate($_SESSION['token']);
    if ($result != true){
        header('location:login.php');
    }
} else {
    header('location:login.php');
}


?>