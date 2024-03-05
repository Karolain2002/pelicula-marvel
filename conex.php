<?php
require_once __DIR__ .'/vendor/autoload.php';
require_once __DIR__ .'/controlador/contrlador_peliculas.php';
require_once __DIR__.'/controlador/apicontrolador.php';
require_once __DIR__.'/repositorio/pelirepositorio.php';
require_once __DIR__.'/controlador/controlinicio.php';

use Controlador\ControllerPeliculas;
use Illuminate\Database\Capsule\Manager as Capsule;
use repositorio\peliculasInterface;
use Modelo\Peliculas;
use Modelo\service;
use controlador\ApiControlador;
use repositorio\pelirepositorio;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'prueba',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$apiKey = '67999f9e0626762767a41634482a393d'; // API key de TMDb

$controlador = new ApiControlador();
if (isset($_POST['fetch_data'])) {
    $controlador->fetchData($apiKey);
    echo "Datos obtenidos y guardados correctamente.";
}

// Crear una instancia concreta de Peliculasrepository que implemente Peliculasrepository
$repositorio = new pelirepositorio();
// Inyectar el repositorio en el controlador
$controlador = new ControllerPeliculas($repositorio);
// Ejecutar el método index del controlador
$controlador->index();