<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacte;

class ContacteController extends Controller
{
  public function store(Request $request)
  {
      $request->validate([
          'nom' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'tipus_pregunta' => ['required', 'string', 'min:6'],
          'missatge' => ['required', 'string'],
      ]);

      $contacte = new Contacte ([
          'nom' => $request->get('nom'),
          'email' => $request->get('email'),
          'tipus_pregunta' => $request->get('opcio'),
          'missatge' => $request->get('consulta'),
          'estat' => 1,
      ]);

      $contacte->save();

  }
}
