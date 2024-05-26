<?php
include_once "conexion/conexion.php";
session_start();

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
    <title>Crear Usuario</title>
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
            <a class="nav-link active" aria-current="page" href="permisos.php">Permisos</a>
          </li> 
         </ul>
         <ul class="nav justify-content-center m-3 pt-2 mb-2 mt-0">
          <li class="nav-item"><a href="cerrar.php" class="nav-link px-2 text-danger btn btn-outline-danger"><font style="vertical-align: inherit;">Cerrar Sesion</font></a></li>
        </ul>
      </div>
   </div>
</nav>
  <body>
    <div class="container w-75 bg-secondary mt-5 mb-5 rounded shadow">
      <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white p-5 rounded-end">
          <div class="text-end">
            <img src="img/logo.png" width="48" alt="logo">
          </div>
          <h2 class="fw-bold text-center py-5 box-shadow">Crear Usuario</h2>
          <form action="controlador/create_user.php" method="POST">
            <div class="mb-4">
              <label for="username" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="username" aria-describedby="emailHelp" minlength="5" maxlength="16" required>
            </div>
            <div class="mb-4">
              <label for="name" class="form-label">Nombre de usuario</label>
              <input type="text" id="name" class="form-control" name="name" aria-describedby="emailHelp" minlength="5" maxlength="16" required>
              <small id="error-message" class="error" style="display:none;">Solo se permiten letras.</small>
            </div>

            <script>
              document.getElementById('name').addEventListener('input', function (event) {
                const input = event.target;
                const value = input.value;
                const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ´ ]*$/;

                if (!regex.test(value)) {
                  input.value = value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ´ ]/g, '');
                  document.getElementById('error-message').style.display = 'block';
                } else {
                  document.getElementById('error-message').style.display = 'none';
                }
              });
            </script>
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" minlength="10" maxlength="30" required>
            </div>      
              <div class="mb-4">
                  <label for="password" class="form-label">Contraseña</label>
                  <div class="input-group">
                      <input type="password" class="form-control" id="password" name="password" required minlength="8" maxlength="16">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">Mostrar</button>
                  </div>
                  <div id="passwordHelp" class="form-text"></div>
              </div>
              <div class="mb-4">
                  <label for="password_confirmmar" class="form-label">Confirmar Contraseña</label>
                  <div class="input-group">
                      <input type="password" class="form-control" id="password_confirmar" name="password_confirmar" required minlength="8" maxlength="16">
                      <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">Mostrar</button>
                  </div>
              </div>
            <div class="mb-4">
                <label for="question" class="form-label">Pregunta de seguridad N1</label>
                <select class="form-select" name="question">
                    <option value="¿Cuál es el nombre de tu mascota?">¿Cuál es el nombre de tu mascota?</option>
                    <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    <option value="¿Cuál es el nombre de soltera de tu madre?">¿Cuál es el nombre de soltera de tu madre?</option>
                    <option value="¿color favorito?">¿color favorito?</option>
                </select>
            </div>
            <div class="mb-4">
              <label for="answer" class="form-label">Respuesta</label>
              <input type="text" class="form-control" name="answer" minlength="5" maxlength="16" required>
            </div>
            <div class="mb-4">
                <label for="question2" class="form-label">Pregunta de seguridad N2</label>
                <select class="form-select" name="question2">
                    <option value="¿Super heroe favorito?">¿Super heroe favorito?</option>
                    <option value="¿En qué ciudad nació tu madre?">¿En qué ciudad nació tu madre?</option>
                    <option value="¿Cuál es el nombre de tu mejor amigo de la infancia?">¿Cuál es el nombre de tu mejor amigo de la infancia?</option>
                    <option value="¿Cuál es tu canción favorita?">¿Cuál es tu canción favorita?</option>
                </select>
            </div>
            <div class="mb-4">
              <label for="answer2" class="form-label">Respuesta</label>
              <input type="text" class="form-control" name="answer2" minlength="5" maxlength="16" required>
            </div>
            <div class="mb-4">
                <label for="question3" class="form-label">Pregunta de seguridad N3</label>
                <select class="form-select" name="question3">
                    <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
                    <option value="¿Cuál es el nombre de tu abuela materna?">¿Cuál es el nombre de tu abuela materna?</option>
                    <option value="¿Cuál es tu película favorita?">¿Cuál es tu película favorita?</option>
                    <option value="¿Cuál es tu equipo deportivo favorito?">¿Cuál es tu equipo deportivo favorito?</option>
                </select>
            </div>
            <div class="mb-4">
              <label for="answer3" class="form-label">Respuesta</label>
              <input type="text" class="form-control" name="answer3" minlength="5" maxlength="16" required>
            </div>

            <?php if (isset($mensaje)): ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $mensaje; ?>
              </div>
            <?php endif; ?>
            <div class="d-grid">
              <button type="submit" class="btn btn-dark"><h5>Crear Usuario</h5></button>
            </div>
          </form>
          <br>
        </div>
      </div>
    </div>
    <div class="">
      <footer class="sticky-bottom mt-2 pb-1">
        <h1 class="text-center text-light "><img src="img/logo.png" width="30" alt="">SGCPSP</h1>
        <p class="text-center text-light fw-bold"><font style="vertical-align: inherit;">© 2023 Sistema de Gestión y Control de los Proyectos Socio Productivos</font></p><hr><br>
      </footer>
    </div>

    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const password = document.querySelector('#password');
    const passwordConfirm = document.querySelector('#password_confirmar'); // Aquí corregimos el identificador

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
    });

    togglePasswordConfirm.addEventListener('click', function() {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
    });
</script>


<script>
    document.getElementById("password").addEventListener("input", function() {
        var password = this.value;
        var containsCharacter = /[a-zA-Z]/.test(password);
        var containsNumber = /\d/.test(password);
        var containsSpecialCharacter = /[!@#$%^&*()\-_=+{};:,<.>]/.test(password);
        var isValid = containsCharacter && containsNumber && containsSpecialCharacter;

        if (!isValid) {
            document.getElementById("passwordHelp").textContent = "La contraseña debe tener al menos un carácter, un número y un carácter especial.";
            document.getElementById("password").setCustomValidity("La contraseña debe tener al menos un carácter, un número y un carácter especial.");
        } else {
            document.getElementById("passwordHelp").textContent = "";
            document.getElementById("password").setCustomValidity("");
        }
    });
</script>

<script>
    // Función para evitar la función de copiar en el clic derecho del ratón
    document.addEventListener('contextmenu', function(event) {
        // Verificar si el clic derecho se realiza en un campo de contraseña
        if (event.target.type === 'password') {
            event.preventDefault(); // Evitar el comportamiento predeterminado del menú contextual
        }
    });
</script>


  </body>

</html>