<?php

namespace Controlador;

use repositorio\PeliculasRepositoryInterface;

class ControllerPeliculas
{
    protected $repositorio;

    public function __construct(PeliculasRepositoryInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function index()
    {
        $peliculas = $this->repositorio->obtenerTodas();
        include __DIR__.('/../vista/vistaPeli.php');
    }
}
