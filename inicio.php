<?php 
session_start(); 
  


  include_once "conexion/conexion.php";
  include_once "common/authenticate.php";


  if (!$_GET) {
    header('location:inicio.php?pagina=1');
    }


  //sentencias para el formulario 

  $sql_leer_area = "SELECT * FROM `area`";
  $sentencia_area = $conex->prepare($sql_leer_area);
  $sentencia_area->execute();  
  $resultado_area = $sentencia_area->fetchAll();


  $sql_leer_trayecto = "SELECT * FROM `trayecto`";
  $sentencia_trayecto = $conex->prepare($sql_leer_trayecto);
  $sentencia_trayecto->execute();  
  $resultado_trayecto = $sentencia_trayecto->fetchAll();  

  $sql_leer_proyectos = "SELECT * FROM `proyectos`";
  $sentencia_proyectos = $conex->prepare($sql_leer_proyectos);
  $sentencia_proyectos->execute();  
  $resultado_proyectos = $sentencia_proyectos->fetchAll();

  

  //sentencias para mostrar los proyectos 


  $sql_leer_cantidad_proyectos = "SELECT `proyectos`.*, `trayecto`.`trayecto`, `lineas`.`linea`, `programa`.`programa` ,`area`.`area` 
  FROM `proyectos` 
  inner JOIN `trayecto` ON `proyectos`.`idtrayecto` = `trayecto`.`id` 
  inner JOIN `lineas` ON `proyectos`.`idlinea` = `lineas`.`id` 
  inner JOIN `programa` ON `proyectos`.`idprograma` = `programa`.`id` 
  inner JOIN `area` ON `proyectos`.`idarea` = `area`.`id`
  WHERE true ";

  //Sentencias para el Filtro:


  if (isset($_POST['filtro'])){

    $filtroArea = $_POST['filtroArea'];
    $filtroPrograma = $_POST['filtroPrograma'];
    $filtroLinea = $_POST['filtroLinea'];
    
    if(!empty($filtroArea)){
      $sql_leer_programa = "SELECT * FROM `programa` where idarea='$filtroArea'";
      $sentencia_programa = $conex->prepare($sql_leer_programa);
      $sentencia_programa->execute();  
      $resultado_programa = $sentencia_programa->fetchAll();

      $sql_leer_cantidad_proyectos .= " and `proyectos`.`idarea` ='".$filtroArea."'";
    }
    
    if(!empty($filtroPrograma)){
        $sql_leer_linea = "SELECT * FROM `lineas` where idprograma='$filtroPrograma'";
        $sentencia_linea = $conex->prepare($sql_leer_linea);
        $sentencia_linea->execute();  
        $resultado_linea = $sentencia_linea->fetchAll();

        $sql_leer_cantidad_proyectos .= " and `proyectos`.`idprograma` ='".$filtroPrograma."'";
    }

     if(!empty($filtroLinea)){
        $sql_leer_cantidad_proyectos .= " and `proyectos`.`idlinea` ='".$filtroLinea."'";
     }

  
}
  
  if(isset($_POST['buscar'])){
    $inpbuscar=$_POST['inputbuscar'];
     $sql_leer_cantidad_proyectos .= " and proyectos.id='".strtoupper($_POST['inputbuscar']."'");
  }

  //print_r($sql_leer_cantidad_proyectos);
  //sentencias para la paginacion:
  $sentencia_proyectos = $conex->prepare($sql_leer_cantidad_proyectos);
  $sentencia_proyectos->execute();  
  $totalProyectosDb = $sentencia_proyectos->rowCount();
  $totalProyectos = $totalProyectosDb/3;
  $totalProyectos = ceil($totalProyectos);

  $proyectosxPagina = 3;
  $inicio_conteo_proyectos = ($_GET['pagina']-1)*$proyectosxPagina;

  //anexa
   $sql_leer_cantidad_proyectos .= "LIMIT :inicio, :totalmostrar";
  
  //buscarinformacion deproytectos
  $sentencia_cantidad_proyectos = $conex->prepare($sql_leer_cantidad_proyectos);
  $sentencia_cantidad_proyectos->bindParam(':inicio', $inicio_conteo_proyectos,PDO::PARAM_INT);
  $sentencia_cantidad_proyectos->bindParam(':totalmostrar', $proyectosxPagina,PDO::PARAM_INT);
  $sentencia_cantidad_proyectos->execute();  
  $resultado_cantidad_proyectos = $sentencia_cantidad_proyectos->fetchAll();

  //var_dump ($resultado_cantidad_proyectos);



 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--custom css-->
    <link rel="stylesheet"  href="css/estilos1.css">
    <title>SGCPSP</title>
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <img src="img/logo.png" width="30" class="m-1" alt="">
      <a class="navbar-brand">SGCPSP</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1): ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="usuarios.php">Usuarios</a>
            </li>
          <?php endif; ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Consultar
            </a>
            <form method="POST" id="filtro" name="filtro">
            <ul class="dropdown-menu">
                <li>
                  <div class="input-group">
                    <select class="form-select mb-2 mx-2" name="filtroArea" onchange="buscarprogramas(this)">
                      <option value='' class="">Todas</option>
                      <?php foreach ($resultado_area as $area): ?>
                      <option value="<?php echo $area['id'] ?>" <?= @$filtroArea==$area['id'] ? 'Selected' : ''?> ><?php echo $area['area'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </li>
                <li>
                  <div class="input-group">
                    <select class="form-select mb-2 mx-2" id="filtroPrograma" name="filtroPrograma"  onchange="buscarlineas(this)">
                      <option value='' class="">Todas</option>
                      <?php if(isset($filtroArea)){ ?>
                          <?php foreach ($resultado_programa as $programa): ?>
                          <option value="<?php echo $programa['id'] ?>" <?= @$filtroPrograma==$programa['id'] ? 'Selected' : ''?> ><?php echo $programa['programa'] ?></option>
                          <?php endforeach ?>
                      <?php } ?>
                    </select>
                  </div>
                </li>
                <li>
                  <div class="input-group">
                    <select class="form-select mb-2 mx-2" id="filtroLinea" name="filtroLinea">
                      <option value='' class="">Todas</option>
                      <?php if(isset($filtroPrograma)){ ?>
                          <?php foreach ($resultado_linea as $linea): ?>
                          <option value="<?php echo $linea['id'] ?>" <?= @$filtroLinea==$linea['id'] ? 'Selected' : ''?> ><?php echo $linea['linea'] ?></option>
                          <?php endforeach ?>
                      <?php } ?>
                    </select>
                  </div>
                </li>
                <li>
                  <div class="input-group d-grid gap-1">
                    <button name="filtro" onclick="$('#filtro').submit();"  class="btn btn-outline-primary mx-2">Consultar</button>    
                  </div>
                </li>
            </ul>
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informacion
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="paginas nuevas/como utilizar.php">¿Cómo Utilizar?</a></li>
              <li><a class="dropdown-item" href="paginas nuevas/acerca.php">Acerca de</a></li>
              <li><a class="dropdown-item" href="paginas nuevas/comunidad.php">Comunidad</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <form method="post" id="formbuscar" class="d-flex" role="search">
        <input name="inputbuscar" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="buscar" value="<?= @$inpbuscar ?>">
        <button name="buscar" onclick="$('#formbuscar').submit()" class="btn btn-outline-success">Buscar</button>
      </form>
      <ul class="nav justify-content-center m-3 pt-2 mb-2 mt-0">
          <li class="nav-item"><a href="cerrar.php" class="nav-link px-2 text-danger btn btn-outline-danger"><font style="vertical-align: inherit;">Cerrar Sesion</font></a></li>
        </ul>
    </div>
  </nav>
  <body>
    <div class="container-fluid">
      <div class="row">
          <!--lado izquierdo-->
        <div class="col-5">
          <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded shadow">
              <div class="carousel-item active">
                <img src="img/mi.jpg" class="w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/mi2.jpg" class="w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/mi3.jpg" class="w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <?php if (isset($_SESSION['tipo']) && ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 1)): ?>
            <div class="d-grid gap-2 pt-2 mb-3">
              <button type="button" class="btn btn-dark p-3" data-bs-toggle="modal" data-bs-target="#modalAnadir">
              <h3>Añadir un Proyecto</h3> 
              </button>
            </div>
          <?php endif; ?> 
        </div>
      
        <!--lado derecho-->
        <div class="col-7">
          <?php include_once 'html/proyectos.php' ?>
          <?php include_once 'html/paginacion.php' ?>
        </div>
      </div>
    </div>
    <div class="">
      <footer class="sticky-bottom mt-2 pb-1">
        
        <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
        <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p><br>
      </footer>
    </div>
  </body>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <!-- Modal -->
  <?php include_once 'html/modals.php' ?>
  <?php include_once 'html/editar.php' ?>
   <script type="text/javascript">
  function validate(form){
    var formu=$(form);
    if(formu.find(':invalid').length==0){
      formu.submit();  
    }else{
      alert('Los campos son obligatorios');
    }
  }

  function validat(form){
    var formu=$(form);
    if(formu.find(':invalid').length==0){
      formu.submit();  
    }else{
      alert('Los campos son obligatorios');
    }
  }

   function bus(campo){
    var inpbuscar=$(campo).val();
    location.href="index.php?pagina=1&buscar="+inpbuscar;
  }
  function buscarprogramas(areas){
    var area=$(areas).val();
    $.getJSON('conexion/search.php',{'action':'buscarprogramas','id':area},function(data){
      var text="<option value='' class='d-none' selected>Elige un Programa...</option>";
      for(i in data){
        text +='<option value="'+data[i][0]+'">'+data[i][1]+'</option>';
      }
      $(areas).parents('form').find('#filtroPrograma').html(text).change();
    })
  }

  function buscarlineas(programas){
    var programa=$(programas).val();
    $.getJSON('conexion/search.php',{'action':'buscarlineas','id':programa},function(data){
      var text="<option value='' class='d-none' selected>Elige una Linea...</option>";
      for(i in data){
        text +='<option value="'+data[i][0]+'">'+data[i][1]+'</option>';
      }
      $(programas).parents('form').find('#filtroLinea').html(text).change();
    })
  }
  var inactivityTimeout = 300000;  // 300,000 ms = 5 minutos

    var inactivityTimer = setTimeout(function() {
        // Redirigir o realizar alguna acción para cerrar la sesión, como una solicitud AJAX al servidor.
        window.location.href = 'cerrar.php';
    }, inactivityTimeout);

    // Reiniciar el temporizador cuando se detecta actividad del usuario.
    document.addEventListener('mousemove', function() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(function() {
            window.location.href = 'cerrar.php';
        }, inactivityTimeout);
    });
 </script>   
</html>