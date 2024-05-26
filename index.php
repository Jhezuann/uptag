

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
    header('location:inicio.php');

    
}else {
  header('location:login.php');
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
    <title>Inicio de Sesion</title>
  </head>
  <body>
    
<div class="container w-75 bg-secondary mt-5 mb-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
              <!-- <img src="img/tecno5.jpg" class="" width="48" alt="logo"> -->
              <img src="img/logo.png" width="48" alt="logo">
            </div>
            <h2 class="fw-bold text-center py-5 box-shadow">Iniciar Sesión</h2>
            <!--login -->
            <form action="procesar.php" method="POST">
                <div class="mb-4">
                  <label for="usuario" class="form-label">Usuario</label>
                  <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                  <label for="clave" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="clave">
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
</div>
<div class="">
      <footer class="sticky-bottom mt-2 pb-1">
        <h1 class="text-center text-light ">SGCPSP</h1>
        <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p><hr><br>
      </footer>
    </div>
</body>
</html>





