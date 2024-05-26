<?php
include_once "conexion/conexion.php";
session_start();

// Verificar si el usuario tiene permiso para acceder a esta página
if ($_SESSION['tipo'] != 1) {
   header('location:inicio.php?pagina=1');
}

// Verificar si se ha enviado el formulario para desbloquear un usuario
if (isset($_POST['usuario_id'])) {
   $usuario_id = $_POST['usuario_id'];

   // Realiza las acciones necesarias para reiniciar los campos en la base de datos
   try {
      // Consulta para reiniciar los campos 'intentos_fallidos' y 'estado' del usuario
      $sql_desbloquear_usuario = "UPDATE usuarios SET intentos_fallidos = 0, estado = 'activo' WHERE id_usuario = ?";
      $sentencia_desbloquear_usuario = $conex->prepare($sql_desbloquear_usuario);
      $sentencia_desbloquear_usuario->execute([$usuario_id]);

      echo "El usuario ha sido desbloqueado correctamente.";
   } catch (PDOException $e) {
      echo "Error al desbloquear el usuario: " . $e->getMessage();
   }
}

// Consulta para obtener usuarios bloqueados
$sql_usuarios_bloqueados = "SELECT * FROM `usuarios` WHERE `estado` = 'bloqueado'";
$sentencia_usuarios_bloqueados = $conex->prepare($sql_usuarios_bloqueados);
$sentencia_usuarios_bloqueados->execute();
$usuarios_bloqueados = $sentencia_usuarios_bloqueados->fetchAll();

// Resto del código y estructura HTML de la página

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
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuarios.php">Ver usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="permisos.php">Permisos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="crear_usuario.php">Crear usuario nuevo</a>
          </li>
         </ul>
         <ul class="nav justify-content-center m-3 pt-2 mb-2 mt-0">
          <li class="nav-item"><a href="cerrar.php" class="nav-link px-2 text-danger btn btn-outline-danger"><font style="vertical-align: inherit;">Cerrar Sesion</font></a></li>
        </ul>
      </div>
   </div>
</nav>
<body>
  <div class="container">
    <h1>Usuarios bloqueados</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Tipo de Cuenta</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios_bloqueados as $usuario): ?>
          <tr>
            <td><?php echo $usuario['id_usuario']; ?></td>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo ($usuario['tipo'] == 1) ? 'Administrador' : 'Normal'; ?></td>
            <td>
              <?php if ($_SESSION['tipo'] == 1): ?>
                <form id="form_desbloquear_<?php echo $usuario['id_usuario']; ?>" method="post">
                  <input type="hidden" name="usuario_id" value="<?php echo $usuario['id_usuario']; ?>">
                  <button type="button" onclick="confirmarDesbloqueo(<?php echo $usuario['id_usuario']; ?>)" class="btn btn-success">Desbloquear</button>
                </form>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Script para mostrar el mensaje de confirmación -->
  <script>
    function confirmarDesbloqueo(idUsuario) {
      var confirmacion = confirm("¿Estás seguro que deseas desbloquear este usuario?");
      if (confirmacion) {
        // Si se confirma la acción, se envía el formulario para desbloquear el usuario
        document.getElementById("form_desbloquear_" + idUsuario).submit();
      }
    }
  </script>

<script type="text/javascript">
    var inactivityTimeout = 180000;  // 300,000 ms = 5 minutos

    var inactivityTimer = setTimeout(function() {
        // Redirigir o realizar alguna acción para cerrar la sesión, como una solicitud AJAX al servidor.
        window.location.href = 'cerra.php';
    }, inactivityTimeout);

    // Reiniciar el temporizador cuando se detecta actividad del usuario.
    document.addEventListener('mousemove', function() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(function() {
            window.location.href = 'cerra.php';
        }, inactivityTimeout);
    });
</script>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="">
    <footer class="sticky-bottom mt-2 pb-1">
      <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
      <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p><hr><br>
    </footer>
  </div>
</body>
</html>
