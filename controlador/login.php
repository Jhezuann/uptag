WW<?php
include_once('../repositories/user.php');
session_start();


$userd = new User();
$result =  $userd -> authenticate($_POST["username"],$_POST["password"]);



$_SESSION['token'] = $result;
header('location:../index.php');

// require_once('conexion/conect.php');



// $user = $_POST["usuario"];
// $clave= $_POST["clave"];


    
//     $sql= "SELECT usuario FROM usuarios where usuario = '$user'";
//     $sql2= "SELECT usuario FROM usuarios where clave = '$clave'";
//     $result = mysqli_query($conexion,$sql);
//     $resul= mysqli_query($conexion,$sql2);
//     $usu = mysqli_num_rows($result);
//     $cla = mysqli_num_rows($resul);
//     $row=mysqli_fetch_assoc($result);
   
    

  

//     if ($usu == 0) {

//       echo "<script text='text/javascript'>
//     alert('Usuario No existe');
//     window.location = 'index.php';
//     </script>";
//     }else if ($cla == 0) {

       
//         echo "<script text='text/javascript'>
//     alert('Clave incorrecta');
//     window.location = 'index.php';
//     </script>";
      
         
    
//     }
    

//     else{

//       $sql3= "SELECT id_usuario,nombre,usuario,clave FROM usuarios WHERE usuario = '$user' AND clave= '$clave'";
//       $resu = mysqli_query($conexion,$sql3);
//       $fila=mysqli_fetch_assoc($resu);
//       $_SESSION["user"] =$fila['usuario'];
   
    
//     header("Location: inicio.php");


//     }

?>
