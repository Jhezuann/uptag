<?php

session_start();

$id = $_SESSION['id'];


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
    <title>Actualizar clave</title> 
  </head>
  <body>
<div class="container w-75 bg-secondary mt-5 mb-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white p-5 rounded-end">

            <h2 class="fw-bold text-center py-5 box-shadow">Actualizar contraseña</h2>
            <!--login -->
             <form action="update_clave.php" method="POST">
                <div class="mb-4">
                  <label for="password" class="form-label">Nueva contraseña</label>
                  <div class="input-group">
                      <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" minlength="8" required>
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">Mostrar</button>
                  </div>
                  <div id="passwordHelp" class="form-text">La contraseña debe tener al menos 8 caracteres.</div>
              </div>
              <div class="mb-4">
                  <label for="password_confirmar" class="form-label">Repita contraseña</label>
                  <div class="input-group">
                      <input type="password" class="form-control" name="password_confirmar" id="password_confirmar">
                      <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">Mostrar</button>
                  </div>
              </div>
                      <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $id;   ?>" >
                <div class="d-grid">
                  <button type="submit" class="btn btn-dark"><h5>Actualizar</h5></button>
                </div>
                <br>
               
            </form>
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

    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const password = document.querySelector('#password');
    const passwordConfirm = document.querySelector('#password_confirmar');

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

    
</body>
</html>