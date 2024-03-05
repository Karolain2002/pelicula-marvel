<?php
//acepta los parametros de conexion
class DatabaseConnection {
    private $servidor;
    private $user;
    private $pass;
    private $db;

    public function __construct($servidor, $user, $pass, $db) {
        $this->servidor = $servidor;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function connect() {
        $conexion = new mysqli($this->servidor, $this->user, $this->pass, $this->db);
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        } else {
            echo "Conectado";
        }
        return $conexion;
    }
}

$servidor = "localhost";
$user = "root";
$pass = "";
$db = "prueba";

$conexionObjeto = new DatabaseConnection($servidor, $user, $pass, $db);
$conexion = $conexionObjeto->connect();