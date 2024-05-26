
<?php

class Token {
  private $db_host;
  private $db_username;
  private $db_password;
  private $db_name;
   
public function __construct() {
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "oca";
    require_once('connect.php');

    $this -> db_host = $db_host;
    $this -> db_username = $db_username;
    $this -> db_password = $db_password;
    $this -> db_name = $db_name;
  }
       
    // Función para autenticar un usuario
  public function authenticate($token) {
      $CONN = new ConexionMySQL($this -> db_host, $this ->db_username, $this ->db_password, $this ->db_name);
      $CONN -> connectDb();
      $conn = $CONN -> conexion;

      // Verificar si la conexión fue exitosa o no
      if ($conn->connect_error) {
        die("dude, this connection sucks: " . $conn->connect_error);
      }

      // Consulta SQL para obtener los datos del token
      $sql = "SELECT * FROM tokens WHERE value = '$token'";
      $result = $conn->query($sql);

      // Verificar si se encontró un usuario con ese nombre y contraseña
      if ($result->num_rows == 1) {
          $fila = $result->fetch_assoc();
          $expired_at = $fila["expired_at"];
          $fechaExpiracion = DateTime::createFromFormat('Y-m-d H:i:s', $expired_at);
          $fechaActual = new DateTime();
          $fechaActual->format('Y-m-d H:i:s');

          return true;
          // $diff = $fechaActual->diff($fechaExpiracion); // Calcular la diferencia entre la fecha y hora actual y la de expiración
          if ( $fechaExpiracion > $fechaActual) {
            return true;
          } 

          if (empty($fila["logout_at"])){
            return false;
          }
          
          
      } 
      return false;
    }

  public function create($user_id) {
        $CONN = new ConexionMySQL($this -> db_host, $this ->db_username, $this ->db_password, $this ->db_name);
        $CONN -> connectDb();
        $conn = $CONN -> conexion;

        $token = uniqid();

        
        $now = new DateTime(); // Obtener la fecha y hora actual
        $now->add(new DateInterval('P30D')); // Agregar 30 días a la fecha actual
        $expired_at = $now->format('Y-m-d H:i:s'); // Formatear la fecha para MySQL
  
        $sql = "INSERT INTO tokens (user_id, value, expired_at) VALUES ('$user_id', '$token','$expired_at')";
        $st =  $conn->query($sql);
        $CONN -> desconnect();
        return $token;
    }

  }

?>