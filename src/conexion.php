<?php

$servidor = "localhost";
$user = "root";
$pass = "";
$db = "prueba";

$conexion = new mysqli($servidor,$user,$pass,$db);

if($conexion->connect_error){
    die("conexion Fallida". $conexion->connect_error);
}else{
    echo"conectado";

}
