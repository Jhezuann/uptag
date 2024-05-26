<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='estilos/estilos.css'>
    <title>¿Como utilizar?</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <img src="img/logo.png" width="30" alt="">  
      <a class="navbar-brand">SGCPSP</a>
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
              <li><a class="dropdown-item" href="acerca.php">Acerca de</a></li>
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
<div class="col">
    <div class="d-inline-flex">
        <div class="card m-2 mb-3">
            <img src="img/barra.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                La barra de navegación te ofrece los procesos básicos e informativos que contiene el sistema. Cuenta con una opción de búsqueda por código que genera cada proyecto y finalmente la ópcion de <b>Cerrar sesion</b>.
            </div>
        </div>
        <div class="card m-2 mb-3">
            <img src="img/cosultar.jpg" class="card-img-top" alt="...">
            <div class="card-body">
             En esta sección, puedes buscar y localizar proyectos insertando información sobre el <b>área/programa de investigación/linea de investigación</b>. 
            </div>
        </div>
    </div> 
</div>
<div class="col">
    <div class="d-inline-flex">
        <div class="card m-2 mb-3">
            <img src="img/informacion.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                Aquí podrás encontrar información sobre los creadores del sistema, la comunidad del PNFI y cómo utilizar el sistema.  
            </div>
        </div>
        <div class="card m-2 mb-3">
            <img src="img/carousel.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              Representado por un carousel, se muestran algunas ilustraciones sobre el sistema, su comunidad y sus autores.   
            </div>
        </div>
    </div> 
</div>
<div class="col">
    <div class="d-inline-flex">
        <div class="card m-2 mt-2 mb-3">
            <img src="img/añadir.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                Con esta función se procede a insertar cada proyecto socio productivo, completando cada uno de los campos de información que se deben ingresar de forma <b>obligatoria</b>.
            </div>
        </div>
        <div class="card m-2 mt-2 mb-3">
            <img src="img/carta.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                Representado en cartas, se almacena cada proyecto socio productivo y su información, el cual puede ser eliminado, modifacado o descargado a el dispositivo.
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