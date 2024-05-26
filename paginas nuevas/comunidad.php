<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='estilos/estilos1.css'>
    <title>Comunidad</title>
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
              <li><a class="dropdown-item" href="como utilizar.php">¿Como utilizar?</a></li>
              <li><a class="dropdown-item" href="acerca.php">Acerca de</a></li>
            </ul>
          </li>
        </ul> 
    </div>    
    <ul class="nav justify-content-center m-3 pt-2 mb-2 mt-0">
      <li class="nav-item"><a href="../cerrar.php" class="nav-link px-2 text-light btn btn-outline-danger"><font style="vertical-align: inherit;">Cerrar Sesion</font></a></li>
    </ul> 
</nav>
<body>
    <div class="col-6 m-2 mb-2">
        <div class="card mb-3">
            <img src="img/PNFI.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><b>Historia del Programa de Formación Nacional en Informática (P.N.F.I).</b></h5>
                <p class="card-text"> El departamento Académico de Informática inició sus actividades con la apertura del Programa Nacional de Formación en Informática en la Universidad Politécnica Territorial “Alonso Gamero” el día 28 de Abril del 2010, coincidiendo con el trigésimo noveno (39°) aniversario de la institución, en el marco de la Resolución N° 2.963, se constituyó la Comisión Técnica Interinstitucional del Programa Nacional de Formación en Informática (CTPNFI), la promulgada por el MPPES, el 22 de Mayo del año 2008 a través del Vice Ministerio de Políticas Académicas, quien es el órgano encargado de su ejecución. Cabe destacar, que debido a la masificación de la educación universitaria que abarca la geografía nacional, se considera de valor la incorporación en la administración del PNFI, de los Institutos y Colegios Universitarios, entre ellos el Instituto Universitario Tecnológico “Alonso Gamero” (IUTAG).<br><br>
                    El 28 de Abril del 2010, gracias al esfuerzo de docentes de dicha institución entre ellos la Ing. Yzaimar Colina, vocera para ese entonces del PNFI, quien con dedicación y empeño junto a los docentes Dra. María Acurero, Ing. Carlos Rosillo, Mgs. Yenny Polanco, Ing. Juan Zarraga, Ing. Cesar Ramírez, Licdo. Luis Muñoz, Licdo. Oswaldo Centeno, dieron inicio a la carrera de Ing. en Informática en los turnos de la mañana y noche con trabajadores y familiares de dichos trabajadores, siendo para ese entonces el Coordinador del PNFI el Lcdo. Ing. César Ramírez hasta diciembre del 2012, luego la Ing. Omaris Güigñan procedió a ser la coordinadora del departamento del PNFI hasta el mes de Abril del 2015.<br><br> 
                    Posteriormente en Mayo de este año el Lcdo. Elier Nieto, asumió la función de Coordinador de Departamento del PNFI y contaba con la presencia de 49 docentes, 2 docentes auxiliares y 2 empleados administrativos, acompañados de una matrícula de casi 442 estudiantes a cargo de los Jefes de Unidades Académica y Técnica Lcdo. Emilto Chirino y Lcdo. Edgar González. Luego pasa a ser el coordinador del departamento el Lcdo. Edwards Guanipa y en la actualidad el departamento se encuentra bajo la coordinación del Lcdo. Ángel López.</p>
            </div>
        </div>
    </div>
    

    
<footer>
    <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
    <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p><br>
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