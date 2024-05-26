<?php

session_start();
include('conexion/conect.php');

$user = $_POST["usuario"];

$sql= "SELECT * FROM usuarios WHERE usuario = '$user'";

$resultado = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) == 0) {
    echo "<script text='text/javascript'>
    alert('Usuario no está registrado');
    window.location = 'recuperar.php';
    </script>";
} else {
    $row = mysqli_fetch_assoc($resultado);
    if ($row['estado'] == "bloqueado") {
        echo "<script text='text/javascript'>
        alert('Este usuario está bloqueado');
        window.location = 'recuperar.php'; // Otra página donde se maneje la recuperación de cuenta bloqueada
        </script>";
    } else {
        $_SESSION["id"] = $row['id_usuario'];
        $_SESSION["user"] = $row['usuario'];
        $_SESSION["pregunta"] = $row['pregunta'];
        $_SESSION["respuesta"] = $row['respuesta'];
        $_SESSION["pregunta2"] = $row['pregunta2'];
        $_SESSION["respuesta2"] = $row['respuesta2'];
        $_SESSION["pregunta3"] = $row['pregunta3'];
        $_SESSION["respuesta3"] = $row['respuesta3'];

        header("Location: pregunta.php");
    }
}

?>
