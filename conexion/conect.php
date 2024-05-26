<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "oca";

$conexion = mysqli_connect("localhost","root","","oca");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Error al conectar " . mysqli_connect_error();
  }
  
?>