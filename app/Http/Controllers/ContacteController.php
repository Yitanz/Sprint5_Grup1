<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacte;

class ContacteController extends Controller
{
  public function index()
  {

    $ticket = Contacte::where('id_estat', 1)
    ->join('estat_incidencies','estat_incidencies.id','contacte.id_estat')
    ->get([
      'contacte.id as id',
      'contacte.nom as nom',
      'contacte.email as email',
      'contacte.tipus_pregunta as pregunta',
      'contacte.missatge as missatge',
      'estat_incidencies.nom_estat as nom_estat'
    ]);

    return view('gestio/ticket/index', compact('ticket'));

  }

  public function store(Request $request)
  {

      $contacte = new Contacte ([
          'nom' => $request->get('nom'),
          'email' => $request->get('email'),
          'tipus_pregunta' => $request->get('opcio'),
          'missatge' => $request->get('consulta'),
          'id_estat' => 1,
      ]);

      $contacte->save();

      return redirect('/contacte')->with('success', 'Contacte enviat correctament');
  }


  public function assign($id)
  {
    $ticket = Contacte::find($id);

    return view('/gestio/ticket/assign', compact('ticket'));
  }

}
