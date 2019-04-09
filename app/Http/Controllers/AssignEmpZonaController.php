<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\User;
use \App\Zona;
use \App\AssignEmpZona;

class AssignEmpZonaController extends Controller
{
  private $data_inici_global;

  private $data_fi_global;



  public function index()
  {
    $assignacions = Zona::all();

    return view('gestio/AssignEmpZona/index', compact('assignacions'));
  }
  
  public function viewData(){

    return view('gestio/AssignEmpZona/date');

  }
  public function filterEmploye(Request $request, $data){
    dd($data);
    return view('gestio/AssignEmpZona/freeEmploye');
  }
}


  