<?php

namespace modelo;

use Illuminate\Database\Eloquent\Model;

class peliculas1 extends Model
{
    protected $table = 'peliculas';
    protected $fillable = ['id_pelicula','title', 'overview', 'poster_path'];
    public $timestamps = false;
}