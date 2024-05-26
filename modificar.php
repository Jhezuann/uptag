<?php
include_once "conexion/conexion.php";

    

if ($_POST) {
    $id = $_POST['id'];
    $idarea = $_POST['idarea'];
    $idprograma = $_POST['idprograma'];
    $idtrayecto = $_POST['idtrayecto'];
    $idlinea = $_POST['idlinea'];
    $titulo = $_POST['titulo'];
    $tutor = $_POST['tutor'];
    $ano = $_POST['ano'];
    // $pdf = $_POST['pdf'];
    $pdf= $_FILES['document']['name'];
    
    if (isset($_FILES['document']) && $_FILES['document']['type']=='application/pdf'){
        move_uploaded_file($_FILES['document']['tmp_name'], './PDF/'.$_FILES['document']['name']);
        }
   
    
    $sql_editar = 'UPDATE proyectos SET idarea=?, idprograma=?, idtrayecto=?, idlinea=?, titulo=?, tutor=?, ano=?, pdf=? WHERE id=?';
    $sentencia_sql_editar = $conex->prepare($sql_editar);
    $sentencia_sql_editar->execute(array($idarea,$idprograma,$idtrayecto,$idlinea,$titulo,$tutor,$ano,$pdf,$id));
    }
    header('location:inicio.php?');
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
