<?php
class Conexion {
    private $servername = "localhost";
    private $usernameDB = "root";
    private $passwordDB = "33946"; 
    private $dbname = "loginnegroBD";
    private $conn;

    public function __construct() {
        try {
            // Crear la conexión utilizando PDO
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->usernameDB, $this->passwordDB);
            // Establecer el modo de error de PDO a excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Puedes descomentar la siguiente línea para depuración
            // echo "Conectado correctamente";
        } catch (PDOException $e) {
            // Mostrar mensaje de error (más adecuado en un archivo de registro en producción)
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    // Método para obtener la conexión
    public function getConnection() {
        return $this->conn;
    }

    // Método para cerrar la conexión
    public function closeConnection() {
        $this->conn = null;
    }
}
?>
