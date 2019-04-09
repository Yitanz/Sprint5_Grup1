<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\User;
use \App\Zona;
use \App\AssignEmpZona;

class AssignEmpZonaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $assignacions = Zona::all();

    return view('gestio/AssignEmpZona/index', compact('assignacions'));
  }

  public function viewData(Request $request, $id){
    $zona = zones::find($id);
    return view('gestio/AssignEmpZona/date', compact('zona'));

  }
  public function filterEmploye(Request $request){
    return view('gestio/AssignEmpZona/freeEmploye');
  }
}
