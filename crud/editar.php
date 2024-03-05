<?php
// Conexión a la base de datos
require '../src/conexion.php';

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}


// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nuevo_title = $_POST['title'];
    $nuevo_overview = $_POST['overview'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE peliculas SET title='$nuevo_title', overview='$nuevo_overview' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
}

// Obtener el ID del usuario a editar (supongamos que se pasa como parámetro en la URL)
$id = $_GET['id'];

// Obtener los datos del usuario de la base de datos
$sql = "SELECT * FROM peliculas WHERE id =$id";
$result=mysqli_query($conexion,$sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar peliculas</title>
</head>
<body>
    <h2>Editar peliculas</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="title">Nuevo Nombre:</label>
        <input type="text" name="nuevo_title" value="<?php echo $usuario['title']; ?>"><br><br>
        <label for="overview">Nuevo año:</label>
        <input type="overview" name="nuevo_overvuew" value="<?php echo $usuario['overview']; ?>"><br><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
<?php
} else {
    echo "No se encontró ningún usuario con ese ID.";
}

$conexion->close();
?>