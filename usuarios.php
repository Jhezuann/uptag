<?php
include_once "conexion/conexion.php";
session_start();

// Verificar si el usuario tiene permiso para acceder a esta página
if ($_SESSION['tipo'] != 1) {
    header('location:inicio.php?pagina=1');
    exit(); // Asegúrate de salir del script después de redirigir
}

// Verificar si se envió el formulario de eliminar_usuario
if (isset($_POST['id_usuario']) && isset($_POST['confirmacion']) && $_POST['confirmacion'] == 'si') {
    // Obtener el ID del usuario a eliminar
    $idUsuarioEliminar = $_POST['id_usuario'];

    // Eliminar registros relacionados en la tabla 'tokens'
    $sql_eliminar_tokens = "DELETE FROM tokens WHERE user_id = :id";
    $sentencia_eliminar_tokens = $conex->prepare($sql_eliminar_tokens);
    $sentencia_eliminar_tokens->bindParam(':id', $idUsuarioEliminar, PDO::PARAM_INT);
    $sentencia_eliminar_tokens->execute();

    // Eliminar al usuario de la tabla 'usuarios'
    $sql_eliminar = "DELETE FROM usuarios WHERE id_usuario = :id";
    $sentencia_eliminar = $conex->prepare($sql_eliminar);
    $sentencia_eliminar->bindParam(':id', $idUsuarioEliminar, PDO::PARAM_INT);
    $sentencia_eliminar->execute();

    // Verificar si se eliminó correctamente
    if ($sentencia_eliminar->rowCount() > 0) {
        echo "Usuario eliminado exitosamente";
    } else {
        echo "Error al eliminar el usuario";
    }

    // Redirigir a la página principal después de eliminar el usuario
    header("Location: usuarios.php");
    exit(); // Asegúrate de salir del script después de redirigir
}

// Consulta para obtener todos los usuarios
$sql_usuarios = "SELECT * FROM usuarios";
$sentencia_usuarios = $conex->prepare($sql_usuarios);
$sentencia_usuarios->execute();
$usuarios = $sentencia_usuarios->fetchAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <script>
    function confirmarEliminacion(idUsuario) {
        var confirmacion = confirm("¿Seguro que deseas eliminar este usuario?");

        if (confirmacion) {
            // Crear un formulario dinámicamente
            var form = document.createElement("form");
            form.method = "post";
            form.action = ""; // Coloca aquí la URL del archivo PHP que procesa el formulario

            // Agregar un campo oculto para el ID del usuario
            var idInput = document.createElement("input");
            idInput.type = "hidden";
            idInput.name = "id_usuario";
            idInput.value = idUsuario;

            // Agregar un campo oculto para confirmar la eliminación
            var confirmacionInput = document.createElement("input");
            confirmacionInput.type = "hidden";
            confirmacionInput.name = "confirmacion";
            confirmacionInput.value = "si";

            // Agregar los campos ocultos al formulario
            form.appendChild(idInput);
            form.appendChild(confirmacionInput);

            // Agregar el formulario al cuerpo del documento
            document.body.appendChild(form);

            // Enviar el formulario
            form.submit();
        }
    }
</script>
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
            <a class="nav-link active" aria-current="page" href="usuarios_bloqueados.php">Usuarios bloqueados</a>
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
        <h1>Listado de Usuarios</h1>

        <?php if (!empty($usuarios)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de Cuenta</th>
                        <!-- Agrega las columnas adicionales que necesites mostrar -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['id_usuario']; ?></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo ($usuario['tipo'] == 1) ? 'Administrador' : 'Normal'; ?></td>
                            <td>
                            <?php if ($_SESSION['tipo'] == 1 && $usuario['tipo'] == 2 && $usuario['id_usuario'] != 1): ?>
                                <button type="button" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $usuario['id_usuario']; ?>)">Eliminar</button>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron usuarios.</p>
        <?php endif; ?>
    </div>
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

</html>
