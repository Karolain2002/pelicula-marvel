<?php 
    require '../src/conexion.php';

    $id=$_GET['id'];

    $sql="SELECT * FROM peliculas WHERE id='$id'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../estilos/nav1.css" rel="stylesheet">
        <title>Editar peliculas</title>
        
    </head>
    <body>
        <div class="users-form">
        <h1 >Editar Peliculas</h1>
            <form action="../crud/editar1.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="title" placeholder="TITULO:" value="<?= $row['title']?>">
                <input type="text" name="overview" placeholder="DESCRIPCION:" value="<?= $row['overview']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>