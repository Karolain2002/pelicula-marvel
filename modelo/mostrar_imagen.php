<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID de la imagen
$id = $_GET['poster_path'];

// Consulta para obtener la imagen desde la base de datos
$sql = "SELECT poster_path, jpg, blob FROM peliculas WHERE poster_path = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mostrar la imagen
    header("Content-Type: " . $row['poster_path']);
    echo $row['datos_imagen'];
} else {
    echo "Imagen no encontrada";
}

// Cerrar la conexión
$conn->close();
?>
