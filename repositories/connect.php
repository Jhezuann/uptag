<?php

class ConexionMySQL {
    public $conexion;
    private $host;
    private $usuario;
    private $password;
    private $nombreBD;

    public function __construct($host, $usuario, $password, $nombreBD) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->nombreBD = $nombreBD;
    }

    public function connectDb() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->nombreBD);

        if ($this->conexion->connect_error) {
            die("Error al conectar con la base de datos: " . $this->conexion->connect_error);
        }
        //echo "Conexión exitosa a la base de datos MySQL.";
    }

    public function desconnect() {
        $this->conexion->close();
        // echo "Conexión cerrada.";
    }
}



$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "oca";
?>