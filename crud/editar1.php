<?php

require '../src/conexion.php';

$id=$_POST["id"];
$title = $_POST['title'];
$overview = $_POST['overview'];

$sql="UPDATE peliculas SET title='$title', overview='$overview' WHERE id='$id'";
$result=mysqli_query($conexion,$sql);

if($result){
    Header("Location: ../modelo/milista.php");
}else{

}

?>