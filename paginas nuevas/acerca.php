<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='estilos/estilos2.css'>
    <title>Acerca de</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <img src="img/logo.png" width="30" alt="">
      <a class="navbar-brand m-1">SGCPSP</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Consultar
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informacion
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="como utilizar.php">¿Como utilizar?</a></li>
              <li><a class="dropdown-item" href="comunidad.php">Comunidad</a></li>
            </ul>
          </li>
        </ul>  
    </div>    
    <ul class="nav justify-content-center m-3 pt-2 mb-2 mt-0">
      <li class="nav-item"><a href="../cerrar.php" class="nav-link px-2 text-light btn btn-outline-danger"><font style="vertical-align: inherit;">Cerrar Sesion</font></a></li>
    </ul>
</nav>
<body>
  <div class="row">
    <div class="col">
      <div class="d-inline-flex">
       <div class="card m-2 mb-3" style="width: 850px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/oscar.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-text">Sistema desarrollado en 2022-2023 por el grupo investigador conformado por Medina Juan, Carrillo Yambardo y Sangronis Oscar. Con la ayuda y orientaciones del profesor Luis Miguel Pachano y Joel Medina. Así como contribuciones de la Responsable de los proyectos socio productivos Dra Elizabeth García. Así como ayuda de personas externas como Jhonnal Kishibe y Xavier Guanipa.</p>
                <p class="card-text"><small class="text-body-secondary">2022-2023</small></p>
              </div>
            </div>
          </div>
      </div> 
      </div>
    </div>
    <div class="col">
      <div class="d-inline-flex">
       <div class="card m-2 mb-3" style="width: 850px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/oca.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-text">El tema principal de la investigación es de crear un sistema que pueda gestionar y almacenar mediante una base de datos, los proyectos socio integradores de los estudiantes del PNF de informática. Este trabajo de investigación se  llevó  a cabo para solventar la falta de un sistema de información, logrando de esta manera una solución definitiva.</p>
                <p class="card-text"><small class="text-body-secondary">SISTEMA DE GESTIÓN Y CONTROL DE LOS PROYECTOS SOCIO PRODUCTIVOS.</small></p>
              </div>
            </div>
          </div>
      </div> 
      </div>
    </div>
    <div class="col">
      <div class="d-inline-flex">
       <div class="card m-2 mb-3" style="width: 850px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/1.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-text">Utilizando y promoviendo el uso de las nuevas tecnologias y el software libre para la creacion de productos informaticos que conservan el ambiente y la evolucion de su entorno.</p>
                <p class="card-text"><small class="text-body-secondary">SGCPSP.</small></p>
              </div>
            </div>
          </div>
      </div> 
      </div>
    </div>
  </div>
    

    
<footer>
    <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
    <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio productivos</font></p><br>
</footer>
    <script src="js/bootstrap.bundle.js"></script>
</body>
<script type="text/javascript">
    var inactivityTimeout = 180000;  // 300,000 ms = 5 minutos

    var inactivityTimer = setTimeout(function() {
        // Redirigir o realizar alguna acción para cerrar la sesión, como una solicitud AJAX al servidor.
        window.location.href = '/sistema/cerrar.php';  // Cambia a una URL absoluta
    }, inactivityTimeout);

    // Reiniciar el temporizador cuando se detecta actividad del usuario.
    document.addEventListener('mousemove', function() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(function() {
            window.location.href = '/sistema/cerrar.php';  // Cambia a una URL absoluta
        }, inactivityTimeout);
    });

</script>

</html>