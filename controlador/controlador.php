<?php  

	include_once 'conexion/conexion.php';

		$idProyecto = $_GET['idProyecto'];

	$sql_borrar_proyecto = 'DELETE FROM proyectos WHERE id=?';
	$sentencia_borrar = $conex->prepare($sql_borrar_proyecto);
	$sentencia_borrar = $sentencia_borrar->execute(array($idProyecto));
	header('location:inicio.php')
?>