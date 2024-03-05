<?php

namespace repositorio;
require_once 'repositorio/peliculasrepositoriointerface.php';
require_once __DIR__ . '/../modelo/peliculas1.php';


use modelo\peliculas1;

class pelirepositorio implements PeliculasRepositoryInterface
{
    public function obtenerTodas()
    {
        return peliculas1::all();
    }
}