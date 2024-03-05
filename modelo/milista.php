<?php
$conexion = mysqli_connect('localhost','root','','prueba');
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
	<link rel="stylesheet" href="../../pagina/estilos/nav1.css">
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
 
	<div class="users-form">
        <h1 >Crear Peliculas</h1>
        <form action="../crud/agregar.php" method="POST">
            <input type="text" name="title" placeholder="titulo de la pelicula">
            <input type="text" name="overview" placeholder="Descripcion">

            <input type="submit" value="Agregar">
        </form>
    </div>

	<br>
	<table >
		<tr>
			<td>ID</td>
			<td>ID PELICULA</td>
			<td>TITULO</td>
			<td>DESCRIPION</td>
			<td>IMAGEN</td>
		</tr>
		<?php
          $sql="select * from peliculas";
		  $result=mysqli_query($conexion,$sql);

		  while($mostrar=mysqli_fetch_array($result)){
		?>
		<tr>
        <td> <?php echo $mostrar ['id']?></td>
		<td> <?php echo $mostrar ['id_pelicula']?></td>
		<td><?php echo $mostrar ['title']?></td>
		<td><?php echo $mostrar ['overview']?></td>
		<td><?php echo "<img width='80' height='80' src='img/".$mostrar['poster_path'].".png'"?></td>
		<td><th><a href="../crud/actualizar.php?id=<?php echo $mostrar ['id']?>">editar</a></th></td>
		<td><th><a href="../crud/eliminar.php?id=<?php echo $mostrar ['id']?>">eliminar</a></th></td>
		</tr>
		<?php
		  }
		  ?>

	</table>
	<script>
       $('#confirm-delete').on('show.bs.modal',function (e) {
         $(this).find('.btn.ok').attr('href',$(e.relatedTarget).data('href'));
		 $('.debug-url').html('DELETE URL:<strong>' + $(this).find('.btn.ok').attr('herf') + '</strong>');
	   });

	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>