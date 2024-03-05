<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/peliculas.css">
    <link rel="stylesheet" href="estilos/nav.css">
    <title>Peliculas</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
		<div class="contenedor">
			<h2 class="logotipo">MarvelPeli</h2>
			<nav>
				<a href="../pagina/modelo/index.php" class="activo">Inicio</a>
				<a href="../pagina/conex.php">Películas</a>
				<a href="../../pagina/modelo/login.php">Suscribete</a>
				<a href="../../pagina/modelo/milista.php">mi lista</a>
                <form action="conex.php" method="post">
                        <button type="submit" name="fetch_data">Obtener Peliculas</button>
                    </form>
			</nav>
		</div>
	</header>
    <div class="main-content" >
        <div class="container">
            <h1>Películas</h1>
            <div class="movie">
            <?php foreach($peliculas as $pelicula): ?>
                    <a href="videos.php?id=<?php echo $pelicula->id; ?>">
                        <div class="movie-card">
                            <img src="<?php echo $pelicula->poster_path; ?>" alt="<?php echo $pelicula->title; ?>">
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>

</html>