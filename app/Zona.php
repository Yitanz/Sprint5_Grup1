<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zones';               //nom de la taula en la base de dades

    //Nom de les columnes de la base de dades
    protected $fillable = [
        'nom'
    ];
}
