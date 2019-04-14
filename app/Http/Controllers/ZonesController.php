<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Zona;
use Auth;

class ZonesController extends Controller
{
    /**
     * Mostra una llista amb els registres
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $zones = Zona::withoutGlobalScopes(['zones.id','zones.nom'])
          ->get();

      return view('gestio/zones/index', compact('zones'));
    }

    /**
     * Mostra un formulari per a crear registres
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestio/zones/create');
    }

    /**
     * Guarda registres nous
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'nom' => 'required'
      ]);

      $user = Auth::user();

      $zona = new Zona([
          'nom' => $request->get('nom'),
      ]);
      $zona->save();
      return redirect('/gestio/zones')->with('info', 'Zona creada correctament');
    }

    /**
     * Mostra el formulari per editar el registre
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $zona = Zona::find($id);

      return view('gestio/zones/edit',compact('zona'));
    }

    /**
     * Actualitza el registre especificat
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'zona_nom'=>'required'
      ]);

      $zona = Zona::find($id);
      $zona->nom = $request->get('zona_nom');
      $zona->save();

      return redirect('/gestio/zones')->with('info', 'Zona actualitzada');
    }

    /**
     * Elimina el registre especificat de la BBDD
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $zona = Zona::find($id);
      $zona->delete();

       return back()->with('info','Zona eliminada');
    }
}
