<?php
include_once "conexion/conexion.php";
session_start();

// Verificar si el usuario tiene permiso para acceder a esta página
if ($_SESSION['tipo'] != 1) {
    header('location:inicio.php?pagina=1');
    exit(); // Asegúrate de salir del script después de redirigir
}

// Verificar si se envió el formulario de promover a admin
if (isset($_POST['promover'])) {
    $usuarioId = $_POST['usuario_id'];
    // Lógica para promover al usuario a administrador en la base de datos
    $sql_promover = "UPDATE usuarios SET tipo = 1 WHERE id_usuario = :id";
    $sentencia_promover = $conex->prepare($sql_promover);
    $sentencia_promover->bindParam(':id', $usuarioId, PDO::PARAM_INT);
    $sentencia_promover->execute();
    // Redirigir a la página de usuarios después de promover al usuario
    header("Location: permisos.php");
    exit(); // Asegúrate de salir del script después de redirigir
}

// Verificar si se envió el formulario de quitar permisos
if (isset($_POST['quitar_permisos'])) {
    $usuarioId = $_POST['usuario_id'];
    // Lógica para quitar los permisos de administrador al usuario en la base de datos
    $sql_quitar_permisos = "UPDATE usuarios SET tipo = 2 WHERE id_usuario = :id";
    $sentencia_quitar_permisos = $conex->prepare($sql_quitar_permisos);
    $sentencia_quitar_permisos->bindParam(':id', $usuarioId, PDO::PARAM_INT);
    $sentencia_quitar_permisos->execute();
    // Redirigir a la página de usuarios después de quitar los permisos
    header("Location: permisos.php");
    exit(); // Asegúrate de salir del script después de redirigir
}

// Consulta para obtener todos los usuarios excepto aquellos con tipo = 0
$sql_usuarios = "SELECT * FROM usuarios WHERE tipo != 0";
$sentencia_usuarios = $conex->prepare($sql_usuarios);
$sentencia_usuarios->execute();
$usuarios = $sentencia_usuarios->fetchAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/estilos1.css">
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
            <a class="nav-link active" aria-current="page" href="usuarios_bloqueados.php">Usuarios bloqueados</a>
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
    <h1>Permisos de usuarios</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Tipo de Cuenta</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo ($usuario['tipo'] == 1) ? 'Administrador' : 'Normal'; ?></td>
            <td>
              <?php if ($usuario['id_usuario'] != 1): ?>
                <?php if ($usuario['tipo'] == 1): ?>
                  <form method="post">
                    <input type="hidden" name="usuario_id" value="<?php echo $usuario['id_usuario']; ?>">
                    <button type="submit" name="quitar_permisos" class="btn btn-warning">Quitar permisos</button>
                  </form>
                <?php else: ?>
                  <form method="post">
                    <input type="hidden" name="usuario_id" value="<?php echo $usuario['id_usuario']; ?>">
                    <button type="submit" name="promover" class="btn btn-primary">Promover a admin</button>
                  </form>
                <?php endif; ?>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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
   <script>
    function confirmPromotion(userId) {
        var confirmation = confirm("¿Estás seguro que quieres promover este usuario a administrador y darle todos los permisos?");
        
        if (confirmation) {
            document.getElementById("promoverForm_" + userId).submit();
        }
        
        return false; // Esto evitará que el formulario se envíe automáticamente después de la confirmación
    }
</script>
<script type="text/javascript">
    var inactivityTimeout = 180000;  // 300,000 ms = 5 minutos

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
