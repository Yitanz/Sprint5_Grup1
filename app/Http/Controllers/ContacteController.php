<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacte;
use App\User;
use App\Linia_contacte;

class ContacteController extends Controller
{

  //retorna el ticket per a imprimira a la taula
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
//guarda ticket en contacte
  public function store(Request $request)
  {
      $numTiquet = rand(11111,99999);
      $contacte = new Contacte ([


          'nom' => $request->nom,
          'email' => $request->email,
          'tipus_pregunta' => $request->tipus_pregunta,
          'missatge' => $request->consulta,
          'id_estat' => 1,
          'id_tiquet' =>$numTiquet
          
      ]);

      $contacte->save();

      
      
      return response()->json(['success'=>'Data is successfully added']);

      //return redirect('/contacte')->with('success', 'Contacte enviat correctament');
  }

//llista empleat
  public function llistarEmpleats($id)
  {
    $user = User::where('id_rol', 6)
    ->get([
      'users.id',
      'users.nom',
      'users.cognom1',
      'users.email',
    ]);

    $tiquet = Contacte::find($id);


    return view('/gestio/ticket/assign', compact('user', 'tiquet'));
  }

//guarda ticket
  public function saveTicket(Request $request)
  {

    $lineContact = new Linia_contacte ([
      'id_ticket_contacte' => $request->get('tiquetID'),
      'id_empleat' => $request->get('id_empleat')
    ]);

    $lineContact->save();

    return redirect('/gestio/ticket')->with('success', 'Contacte enviat correctament');

  }

//llista els tickets assignats
  public function assignList()
  {
    $linia = Linia_Contacte::where('id_estat', 1)
    ->join('contacte AS con', 'linia_contacte.id_ticket_contacte', 'con.id')
    ->join('users AS us', 'linia_contacte.id_empleat', 'us.id')
    ->join('estat_incidencies','estat_incidencies.id','con.id_estat')
    ->get([
      'linia_contacte.id as id',
      'us.nom as nom_empleat',
      'con.email as email',
      'con.tipus_pregunta as pregunta',
      'con.missatge as missatge',
      'estat_incidencies.nom_estat as nom_estat'
    ]);

    return view('/gestio/ticket/list', compact('linia'));
  }

  public function destroy($id)
  {
      $linia = Linia_Contacte::find($id);
      $linia->delete();
      return redirect('/gestio/ticket/list')->with('success', 'ticket suprimit correctament');

  }

  public function conclude($id)
  {
    $ticket = Contacte::findOrFail($id);

    $ticket->id_estat = 3;

    $ticket->save();

    return redirect('/tasques')->with('success', 'Ticket finalitzat correctament');
  }
}
