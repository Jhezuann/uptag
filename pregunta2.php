<?php

session_start();
$usu = $_SESSION['user'];
$pregunta = $_SESSION['pregunta2'];


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
    <title>Validar respuesta</title>
  </head>
  <body>
<div class="container w-75 bg-secondary mt-5 mb-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white p-5 rounded-end">

            <h2 class="fw-bold text-center py-5 box-shadow"><?php echo $pregunta; ?></h2>
            <!--login -->
            <form action="validar_res.php" method="POST">
                <div class="mb-4">
                  <label for="usuario" class="form-label">Respuesta</label>
                  <input type="text" class="form-control" name="respuesta2" aria-describedby="emailHelp">
                </div>
                
                <div class="d-grid">
                  <button type="submit" class="btn btn-dark"><h5>Enviar</h5></button>
                </div>
               
            </form>
            <br>

              <div class="d-grid">
                  <button class="btn btn-dark" onclick="window.location.href = 'pregunta3.php';"><h5>Probar tercera pregunta de seguridad</h5></button>
                </div>
                <br>
                <div class="d-grid">
                  <button class="btn btn-dark" onclick="window.location.href = 'login.php';"><h5>Cancelar</h5></button>
                </div>
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
