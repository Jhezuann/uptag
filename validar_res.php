<?php

session_start();

include('conexion/conect.php');

$user = $_SESSION['user'];
$resultadopuesta = hash('sha256', $_POST['respuesta']);
$resultadopuesta2 = hash('sha256', $_POST['respuesta2']);
$resultadopuesta3 = hash('sha256', $_POST['respuesta3']);

$sql = "SELECT * FROM usuarios WHERE usuario = '$user' AND 
        (respuesta = '$resultadopuesta' OR respuesta2 = '$resultadopuesta2' OR respuesta3 = '$resultadopuesta3')";

$resultado = mysqli_query($conexion, $sql);

// Obtener la URL de la página anterior usando HTTP_REFERER
$pagina_anterior = $_SERVER['HTTP_REFERER'];

if (mysqli_num_rows($resultado) == 0) {
    echo "<script text='text/javascript'>
        alert('Respuesta incorrecta');
        window.location = '$pagina_anterior'; // Redirige a la página anterior
        </script>";
} else {
    $row = mysqli_fetch_assoc($resultado);
    $_SESSION["id"] = $row['id_usuario'];
    $_SESSION["user"] = $row['usuario'];
    header("Location: nueva_clave.php");
    exit(); // Asegurémonos de que no haya ninguna salida adicional después de redirigir
}
?>
