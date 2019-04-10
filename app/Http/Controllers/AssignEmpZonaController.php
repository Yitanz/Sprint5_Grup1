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

    $zona = Zona::find($id);
    return view('gestio/AssignEmpZona/date', compact('zona'));

  }
  public function filterEmploye(Request $request, $id){

    $data_inici = $request->get('data_inici_assignacio_empleat');
    $data_fi = $request->get('data_fi_assignacio_empleat');

    $user = AssignEmpZona::assignarMantenimentFiltro($data_inici, $data_fi, $id);

    return view('gestio/AssignEmpZona/freeEmploye', compact('user','data_inici', 'data_fi', 'id'));
  }
}
