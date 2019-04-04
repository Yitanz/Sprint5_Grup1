<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Servei;
use \App\User;
use \App\Zona;
use \App\ServeisZones;

class ServeisDesactivats extends Controller
{
  public function index()
  {
    $assignacions = Zona::where('id_estat',3)
    ->join ('serveis_zones','serveis_zones.id_zona', '=', 'zones.id')
    ->join('users', 'serveis_zones.id_empleat', '=', 'users.id')
    ->join('serveis', 'serveis_zones.id_servei', '=', 'serveis.id')
    ->get ([
      'serveis_zones.id as id',
      'zones.nom as nom_zona',
      'serveis.nom as nom_servei',
      'users.nom as nom_empleat'
    ]);

    return view('gestio/ServeisDesactivats/index', compact('assignacions'));
  }
}
