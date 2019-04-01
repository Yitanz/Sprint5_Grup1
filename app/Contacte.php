<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacte extends Model
{
  protected $table = 'contacte';

    protected $fillable = [
      'nom',
      'email',
      'tipus_pregunta',
      'missatge',
      'id_estat'
    ];

}
