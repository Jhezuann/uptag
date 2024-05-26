<?php

include('conexion/conect.php');

$id_usuario = $_POST['id_usuario'];
$clave = hash('sha256', $_POST['password']);
$clave2 = hash('sha256', $_POST['password_confirmar']);

if ($clave !== $clave2) {
	echo "<script> alert('password no coinciden'); window.location.href = 'nueva_clave.php';</script>";
	exit;
}

$sql = "UPDATE usuarios SET clave='$clave' WHERE id_usuario='$id_usuario'";

  $result = mysqli_query($conexion, $sql);

  if ($result) {
	    echo "<script> alert('Contraseña Modificada'); 
              window.location.href = 'index.php';

	    </script>";

	} else {
	    echo "Error: No se pudo guardar el registro ";
	}

