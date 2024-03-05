<?php

namespace repositorio;

interface apim {
    public function fetchMovies($apiKey);
    public function fetchVideoKey($movieId, $apiKey);
}