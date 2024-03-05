<?php
require_once '../vendor/autoload.php';
require_once '../controlador/ApiControlador.php';
require_once '../modelo/apmodelo.php';
require_once '../repositorio/PeliculasRepositoryInterface';
require_once '../repositorio/pelirepositorio.php';
require_once '../controlador/controlinicio.php';
require_once '../modelo/pelicula1.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use controlador\ControlInicioPeliculas;
use controlador\apicontrolador;
use modelo\apmodelo;
use repositorio\pelirepositorio;
use repositorio\PeliculasRepositoryInterface;

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

$modelo = new apmodelo();
$controlador = new apicontrolador();
if (isset($_POST['fetch_data'])) {
    $controlador->fetchData($apiKey);
    echo "Datos obtenidos y guardados correctamente.";
}

// Crear una instancia concreta de PeliculasRepository que implemente PeliculasRepositoryInterface
$repositorio = new pelirepositorio();
// Inyectar el repositorio en el controlador
$controlador = new ControlInicioPeliculas($repositorio);
// Ejecutar el método index del controlador
$controlador->index();