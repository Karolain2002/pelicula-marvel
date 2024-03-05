<?php

namespace controlador;

require_once __DIR__ . '/../modelo/apmodelo.php';

use modelo\apmodelo;
use repositorio\apim;

class ApiControlador {

    private $modelo;

    public function __construct() {
        $this->modelo = new apmodelo();
    }

    public function fetchData($apiKey) {
        $movies = $this->modelo->fetchMovies($apiKey);

        foreach ($movies as $movie) {
            // Verificar si la película ya existe en la base de datos
            $pelicula = apmodelo::where('id_pelicula', $movie['id_pelicula'])->first();

            // Si la película no existe, la insertamos
            if (!$pelicula) {
                $pelicula = new apmodelo();
                $pelicula->id_pelicula = $movie['id_pelicula'];
                $pelicula->title = $movie['title'];
                $pelicula->overview = $movie['overview'];
                $pelicula->poster_path = $movie['poster_path'];
                $pelicula->save();
            }
        }
    }
    public function setModelo( $modelo)
{
    $this->modelo = $modelo;
}
}