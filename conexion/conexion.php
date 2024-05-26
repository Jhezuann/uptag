<?php

 $link = "mysql:host=localhost;dbname=oca;charset=UTF8";
 $usuario=  "root";
 $pass = "";
 $db='cidilg';
 
try {

 	$conex = new PDO($link, $usuario, $pass);
 	$conex->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 	//echo "conectado";
		 	
	}catch(PDOException $e){
 	echo 'error!:'.$e;
}

?>