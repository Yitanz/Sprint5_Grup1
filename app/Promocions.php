<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocions extends Model
{
     protected $table = 'promocions';               //nom de la taula en la base de dades

     //Nom de les columnes de la base de dades
     protected $fillable = [
    'titol',
    'descripcio',
    'id_usuari',
    'path_img'
  ];
}
