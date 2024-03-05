<?php
// Clase para manejar la conexión y operaciones con la base de datos
class Database {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }
}

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "prueba";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear una instancia de la clase Database e inyectar la conexión a la base de datos
$database = new Database($conn);

// Obtener datos de la API (supongamos que la API devuelve datos en formato JSON)
$url = "http://api.themoviedb.org/3/trending/all/day?api_key=67999f9e0626762767a41634482a393d";
$data = file_get_contents($url);

// Decodificar los datos JSON
$data_array = json_decode($data, true);

// Iterar sobre los datos y guardarlos en la base de datos
foreach ($data_array as $item) {
    $id = $item['id']; // Suponiendo que 'nombre' es un campo de los datos
    $title = $item['title']; // Suponiendo que 'edad' es un campo de los datos

    // Escapar los valores para evitar inyección SQL (mejor usar consultas preparadas)
    $id = $conn->real_escape_string($id);
    $title = $conn->real_escape_string($title);

    // Preparar la consulta SQL para insertar datos
    $sql = "INSERT INTO peliculas (id, title) VALUES ('$id', '$title')";

    // Ejecutar la consulta SQL
    $result = $database->query($sql);
    if ($result === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: ";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

