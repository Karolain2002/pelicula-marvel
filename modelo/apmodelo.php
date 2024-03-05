<?php

namespace modelo;

use Illuminate\Database\Eloquent\Model;
use repositorio\apim;

class apmodelo extends Model 
{
    protected $table = 'peliculas';
    // protected $primaryKey = 'id';

    public function fetchMovies($apiKey) {
        // URL de la API de TMDb para obtener las películas populares
        //$url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey;
        $url = 'https://api.themoviedb.org/3/movie/top_rated?api_key=' . $apiKey;


        // Realizar la solicitud a la API para obtener las películas populares
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Obtener solo los datos relevantes de las películas
        $movies = [];
        foreach ($data['results'] as $movie) {
            $movieModel = new apmodelo();
            $movieModel->id_pelicula = $movie['id'];
            $movieModel->title = $movie['title'];
            $movieModel->overview = $movie['overview'];
            $movieModel->poster_path = 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'];
            $movieModel->save();

            $movies[] = $movieModel;
        }

        return $movies;
    }
    
}
