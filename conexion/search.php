<?php 

include_once "conexion.php";

 $action=$_GET['action'];
 $id=$_GET['id'];

 if($action=='buscarprogramas'){
  	 return buscarprogramas($id,$conex);
 }elseif ($action=='buscarlineas') {
 	return buscarlineas($id,$conex);
 }

 function buscarprogramas($idarea,$conex){
  	$sql_leer_programa = "SELECT * FROM `programa` where idarea='$idarea'";
 	$sentencia_programa = $conex->prepare($sql_leer_programa);
  	$sentencia_programa->execute();  
  	$resultado_programa = $sentencia_programa->fetchAll();
  	echo json_encode($resultado_programa);
 }

 function buscarlineas($idprograma,$conex){
  	$sql_leer_programa = "SELECT * FROM `lineas` where idprograma='$idprograma'";
 	$sentencia_programa = $conex->prepare($sql_leer_programa);
  	$sentencia_programa->execute();  
  	$resultado_programa = $sentencia_programa->fetchAll();
  	echo json_encode($resultado_programa);
 }
  

?>