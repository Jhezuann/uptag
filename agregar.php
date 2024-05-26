<?php 
	include_once('conexion/conexion.php');

	if ($_POST) {
    $tituloProyecto = $_POST['tituloProyecto'];
    $profTutor = $_POST['profTutor'];
    $sArea = $_POST['selectArea'];
    $sPrograma = $_POST['selectPrograma'];
    $sLinea = $_POST['selectLinea'];
    $sTrayecto = $_POST['selectTrayecto'];
    $ano = $_POST['ano'];
    $pdf=$_FILES['document']['name'];

    if (isset($_FILES['document']) && $_FILES['document']['type']=='application/pdf'){
        move_uploaded_file($_FILES['document']['tmp_name'], 'PDF/'.$_FILES['document']['name']);
        }

    $agregar =$conex->prepare( "INSERT INTO proyectos (id, idarea, idprograma, idtrayecto, titulo, tutor, ano, pdf, idlinea) VALUES (NULL, '$sArea', '$sPrograma', '$sTrayecto', '$tituloProyecto', '$profTutor', '$ano', '$pdf', '$sLinea')");
      $agregar->execute();

    header('location:inicio.php?');
    }

?>
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
