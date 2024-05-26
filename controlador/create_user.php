<?php
var_dump($_POST); // Agregar esta línea para depurar
include_once('../repositories/user.php');

session_start();

$userd = new User();

$usuario = $_POST["username"];
$nombre = $_POST["name"]; 
$clave = $_POST["password"];
$clave2 = isset($_POST["password_confirmar"]) ? $_POST["password_confirmar"] : ""; // Corregido el nombre del campo

if ($clave !== $clave2) {
    echo "<script> alert('Contraseñas no coinciden'); window.location.href = '../crear_usuario.php';</script>";
    exit;
}

$email = $_POST["email"];
$question = $_POST["question"];
$question2 = $_POST["question2"];
$question3 = $_POST["question3"];
$response  = $_POST["answer"];
$response2  = $_POST["answer2"];
$response3  = $_POST["answer3"];

$result =  $userd->crear($usuario, $nombre, $question, $question2, $question3, $response, $response2, $response3, $clave, $email); // Corregido el nombre del método
if ($result == false) {
    echo "<script text='text/javascript'>
    alert('Data incorrect');
    window.location = '../index.php';
    </script>";
} else {
    // Mostrar mensaje de alerta de usuario registrado exitosamente
    echo "<script>alert('Usuario registrado exitosamente');</script>";
    // Después de mostrar la alerta, redirigir al usuario a login.php
    echo "<script>window.location = 'login.php';</script>";
}

$_SESSION['token'] = $result;
header('location:../index.php');
?>