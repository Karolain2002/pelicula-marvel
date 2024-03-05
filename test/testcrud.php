<?php

namespace Test\Modelo;
// require_once __DIR__ . '/../interfaz/peliculainterfaz.php';
require_once __DIR__ . '/../modelo/apmodelo.php';
// require_once __DIR__ . '/../Modelo/conexionMO.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;
use modelo\apmodelo;

class testcrud extends TestCase
{
    protected $apiKey = '67999f9e0626762767a41634482a393d';

    protected function setUp(): void
    {
        parent::setUp();

        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'peliculas',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function testfetchMovies()
    {
        $apmodelo = new apmodelo();
        $movies = $apmodelo->fetchMovies($this->apiKey)

        // Verificar que se obtuvieron películas
        $this->assertArrayNotHasKey($movies);

        // Verificar que las películas tienen los campos necesarios
          foreach ($movies as $movie) {
              $this->assertArrayHasKey('id_pelicula', $movie);
              $this->assertArrayHasKey('title', $movie);
              $this->assertArrayHasKey('overview', $movie);
              $this->assertArrayHasKey('poster_path', $movie);
          }
    }
}
