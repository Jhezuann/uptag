<?php

class User {
    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;

    public function __construct() {
        require_once('connect.php');
        $this->db_host = $db_host;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }

    public function authenticate($username, $password) {
        // Conexión a la base de datos
        require_once('token.php');
        $CONN = new ConexionMySQL($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        $CONN->connectDb();
        $conn = $CONN->conexion;
    
        // Verificar si la conexión fue exitosa o no
        if ($conn->connect_error) {
            die("La conexión ha fallado: " . $conn->connect_error);
        }
    
        // Encriptar la contraseña usando SHA-256
        $password = hash('sha256', $password);
    
        // Consulta SQL para obtener los datos del usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
        $result = $conn->query($sql);
    
        // Verificar si se encontró un usuario con ese nombre
        if ($result->num_rows == 1) {
            $fila = $result->fetch_assoc();
            $id = $fila["id_usuario"];
            $intentosFallidos = $fila["intentos_fallidos"];
    
            // Verificar si la cuenta está bloqueada
            if ($fila["estado"] === 'bloqueado') {
                return "Cuenta bloqueada";
            } else {
                // Verificar la contraseña
                $storedPassword = $fila["clave"];
                if ($password == $storedPassword) {
                    // La contraseña es correcta, restablecer los intentos fallidos
                    $this->resetFailedLoginAttempts($id, $conn);
                    
                    // Verificar el tipo de usuario
                    $userType = $fila["tipo"];
                    $_SESSION['tipo'] = $userType;  // Establecer el tipo de usuario en la sesión
                    
                    $token = new Token();
                    return $token->create($id);
                } else {
                    // La contraseña es incorrecta, registrar un intento fallido
                    $this->recordFailedLoginAttempt($id, $conn);
                    return "Contraseña incorrecta";
                }
            }
        } else {
            // El usuario no existe
            return "Usuario no encontrado";
        }
    
        // Cerrar la conexión a la base de datos
        $CONN->desconnect();
    }    

    private function getFailedLoginAttempts($userId, $conn) {
        $sql = "SELECT intentos_fallidos FROM usuarios WHERE id_usuario = $userId";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row["intentos_fallidos"];
        } else {
            return 0;
        }
    }

    private function recordFailedLoginAttempt($userId, $conn) {
        $intentosFallidos = $this->getFailedLoginAttempts($userId, $conn);

        // Incrementar el número de intentos fallidos
        $intentosFallidos += 1;

        // Actualiza el número de intentos fallidos en la tabla usuarios
        $sql = "UPDATE usuarios SET intentos_fallidos = $intentosFallidos WHERE id_usuario = $userId";

        if ($intentosFallidos >= 3) {
            // Si se alcanzan 3 intentos fallidos, bloquea la cuenta
            $sql = "UPDATE usuarios SET intentos_fallidos = $intentosFallidos, estado = 'bloqueado' WHERE id_usuario = $userId";
        }

        $conn->query($sql);
    }

    private function resetFailedLoginAttempts($userId, $conn) {
        // Restablece el número de intentos fallidos y el estado en la tabla usuarios
        $sql = "UPDATE usuarios SET intentos_fallidos = 0, estado = 'activo' WHERE id_usuario = $userId";
        $conn->query($sql);
    }

    public function crear($usuario, $nombre, $pregunta, $pregunta2, $pregunta3, $respuesta, $respuesta2, $respuesta3, $clave, $email) {
        require_once('token.php');

        // Verificar la longitud de la contraseña
        if (strlen($clave) < 8) {
            return false;
        }

        $CONN = new ConexionMySQL($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        $CONN->connectDb();
        $conn = $CONN->conexion;

        // Verificar si la conexión fue exitosa o no
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Encriptar la contraseña y las respuestas usando SHA-256
        $clave = $conn->real_escape_string(hash('sha256', $clave));
        $respuesta = $conn->real_escape_string(hash('sha256', $respuesta));
        $respuesta2 = $conn->real_escape_string(hash('sha256', $respuesta2));
        $respuesta3 = $conn->real_escape_string(hash('sha256', $respuesta3));
        $usuario = $conn->real_escape_string($usuario);
        $nombre = $conn->real_escape_string($nombre);
        $pregunta = $conn->real_escape_string($pregunta);
        $pregunta2 = $conn->real_escape_string($pregunta2);
        $pregunta3 = $conn->real_escape_string($pregunta3);
        $email = $conn->real_escape_string($email);
        
        // Consulta SQL para insertar los datos del usuario
        $sql = "INSERT INTO usuarios (usuario, nombre, clave, email, pregunta, pregunta2, pregunta3, respuesta, respuesta2, respuesta3) VALUES ('$usuario', '$nombre', '$clave', '$email', '$pregunta', '$pregunta2', '$pregunta3', '$respuesta', '$respuesta2', '$respuesta3')";
        $result = $conn->query($sql);

        if ($result) {
            // Obtener el ID del nuevo usuario insertado
            $id = $conn->insert_id;
            $CONN->desconnect();
            // Mostrar mensaje de alerta de usuario registrado exitosamente
            echo "<script>alert('Usuario registrado exitosamente');</script>";
            return $id; // Devolver el ID del usuario creado
        } else {
            // Si hay un error en la consulta, mostrar el mensaje de error y devolver falso
            echo "Error al ejecutar la consulta: " . $conn->error;
            $CONN->desconnect();
            return false;
        }
    }
}

?>
