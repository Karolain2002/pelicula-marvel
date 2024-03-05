<?php
require '../src/conexion.php';

$id = $_GET['id'];
$sql="DELETE from peliculas  where id='$id'";
$result=mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>mi lista</title>
    <link rel="stylesheet" href="../../pagina/estilos/nav.css">
	<link rel="stylesheet" href="../../pagina/estilos/lista.css">
</head>
<body>
<header>
		<div class="contenedor">
			<h2 class="logotipo">MarvelPeli</h2>
			<nav>
				<a href="../../pagina/modelo/index.php" class="activo">Inicio</a>
				<a href="../conex.php">Películas</a>
				<a href="../../pagina/modelo/login.php">Suscribete</a>
				<a href="#">mi lista</a>
			</nav>
		</div>
	</header>
  <!-- Agregar
  <h1>Agrega una peliculas</h1>
	<form action="agregar.php" method="POST" enctype="multipart/form-data">
			<input type="text" required name="title" placeholder="nombre..." value=""/><br></br>
			<input type="text" required name="overview" placeholder="año..." value=""/><br></br>
			<input type="submit" value="Guardar">
		</form> -->


	
	<table >
		<tr>
			<td>ID</td>
			<td>Titulo</td>
			<td>Año de lanzamiento</td>
			<td>Img</td>
			<!-- <td></td> -->
		</tr>
		<?php
          $sql="select * from peliculas";
		  $result=mysqli_query($conexion,$sql);

		  while($mostrar=mysqli_fetch_array($result)){
		?>
		<tr>
        <td> <?php echo $mostrar ['id']?></td>
		<td><?php echo $mostrar ['title']?></td>
		<td><?php echo $mostrar ['overview']?></td>
		<!-- <td><?php echo $mostrar ['poster_path']?></td>   -->
		<td><th><a href="../crud/modificar.php?id=<?php echo $mostrar ['id']?>">editar</a></th></td>
		<td><th><a href="../crud/eliminar.php?id=<?php echo $mostrar ['id']?>">eliminar</a></th></td>
		</tr>
		<?php
		  }
		  ?>

	</table>
	<td><th><a href="../crud/agregar.php?id=<?php echo $mostrar ['id']?>">agregar</a></th></td>
	<script>
       $('#confirm-delete').on('show.bs.modal',function (e) {
         $(this).find('.btn.ok').attr('href',$(e.relatedTarget).data('href'));
		 $('.debug-url').html('DELETE URL:<strong>' + $(this).find('.btn.ok').attr('herf') + '</strong>');
	   });

	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>