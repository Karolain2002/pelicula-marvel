
<script>
public function index()
    {
        // Creamos una instancia de Guzzle Client
        $client = new Client();
        
        // Hacemos la solicitud a la API de películas
        $response = $client->get('https://imdb146.p.rapidapi.com/v1/find/?query=marvel', [
            'headers' => [
                'X-RapidAPI-Key' => '19a16b9e3emsh3ec6731e1085d8cp172c66jsn86003e4b9a0a',
                'X-RapidAPI-Host' => 'imdb146.p.rapidapi.com',
            ]
        ]);
        
        // Convertimos la respuesta JSON a un arreglo asociativo
        $data = json_decode($response->getBody(), true);

        // Obtener los resultados de películas
        $titleResults = $data['titleResults'];
        $resultados = $titleResults['results'];

        // Guardamos los datos en nuestra base de datos
        foreach ($resultados as $peliculas) {
            Pelicula::create([
                'titulo' => $movie['title'],
                'overview' => $movie['overview'],
                'sinopsis' => '', // No hay información de sinopsis en esta respuesta
                'idioma' => '', // No hay información de idioma en esta respuesta
            ]);
        }

        // Obtenemos todas las películas de nuestra base de datos
        $peliculas = Pelicula::all();
        
        // Retornamos la vista con las películas
        return view('../modelo/peliculas.php', compact('peliculas'));
    }
    </script>