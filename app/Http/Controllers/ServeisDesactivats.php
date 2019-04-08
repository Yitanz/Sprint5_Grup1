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

  public function edit($id)
  {
    $assign = ServeisZones::find($id);

    $treballadors = User::where('id_rol',3)
    ->whereNotNull('email_verified_at')
    ->get();

    $zones = Zona::all();
    $serveis = Servei::all();

    return view('gestio/serveis/edit', compact(['assign','serveis','zones','treballadors']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'seleccio_zona' => 'required',
      'nom_servei' => 'required',
      'data_inici_assign'=>'required',
      'data_fi_assign'=>'required',
      'seleccio_empleat' => 'required'
    ]);

    $servei = ServeisZones::findOrFail($id);

    $servei->id_zona = $request->get('seleccio_zona');
    $servei->id_servei = $request->get('nom_servei');
    $servei->id_empleat = $request->get('seleccio_empleat');
    $servei->data_inici = $request->get('data_inici_assign');
    $servei->data_fi = $request->get('data_fi_assign');
    $servei->id_estat = 2;
    $servei->save();

    return redirect('gestio/serveis')->with('info', 'Incidència editada correctament');
  }
}
