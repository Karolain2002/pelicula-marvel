<?php
$start_time = microtime(true);

//realiza una solicitud a la pagina
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/pagina/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

$loading_time = number_format(microtime(true) - $start_time,2);

// Establecer la zona horaria a colombia
date_default_timezone_set('America/Bogota');
// mostrar fecha y hora actual
$execution_date = date('d-m-Y H:i:s');

// crea una cadena que contiene fecha y hora de ejecucion
$execution_info = "Datos de ejecucion\n Fecha y hora: $execution_date\n Tiempo: $loading_time seconds\n";

// guarda los datos en el archivo txt
file_put_contents('execution_data.txt', $execution_info, FILE_APPEND);

//imprime el tiempo de ejcucion en una alerta en una alerta
//echo "<script>alert('Tiempo de ejecución: " . $loading_time . " segundos.');</script>";