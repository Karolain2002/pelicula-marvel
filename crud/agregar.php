<?php
require '../src/conexion.php';

$id = null;
$title = $_POST['title'];
$overview = $_POST['overview'];

if($title!=null || $overview!=null){
	$sql ="INSERT INTO peliculas(title,overview) VALUES('".$title."','".$overview."')";
	$result=mysqli_query($conexion,$sql);
	if($title=1){
		header("Location: ../modelo/milista.php");
	}
}

?>
