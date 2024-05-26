<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../repositories/user.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userd = new User();
    $result =  $userd->authenticate($username, $password);

    if ($result === true) {
        // El usuario y la contraseña son válidos
        header('location:../index.php');
        exit;
    } else {
        echo '<script>alert("Nombre de usuario o contraseña incorrectos.");</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="css2/estilos.css">
    <title>Inicio de Sesión</title>
</head>
<body>
<div class="container w-75 bg-secondary mt-5 mb-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <img src="img/logo.png" width="48" alt="logo">
            </div>
            <h2 class="fw-bold text-center py-5 box-shadow">Iniciar Sesión</h2>
            <!--login -->
            <form action="controlador/login.php" method="POST">
                <div class="mb-4">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark"><h5>Ingresar</h5></button>
                </div>
                <div class="my-3">
                    <span><a class="" href="recuperar.php">¿Olvidaste tu contraseña?</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="">
    <footer class="sticky-bottom mt-2 pb-1">
        <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
        <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p>
        <hr><br>
    </footer>
</div>
</body>
</html>
