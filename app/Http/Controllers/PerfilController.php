<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;
use Auth;
use View;
use Response;
use \App\Linia_ventes;
use \App\User_entra_atraccio;
use \App\Venta_productes;
use \App\producte;
use \App\Atributs_producte;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator as LaravelValidator;
use Validator;
class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Add Verified middleware
        //$this->middleware(['auth', 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $tickets = Venta_productes::where('id_usuari', Auth::id())
                ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
                ->join('productes', 'linia_ventes.producte', '=', 'productes.id')
                ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
                ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
                ->whereIn('tipus_producte.id', array(1, 2, 3, 4, 5, 6, 7))
                ->where('atributs_producte.tickets_viatges', '>', 0)
                ->where('productes.estat', '=', 1)
                ->where(function ($tickets) {
                    $tickets->whereNull('atributs_producte.data_entrada')
                            ->orwhereRaw('ABS(TIMESTAMPDIFF(DAY, atributs_producte.data_entrada, NOW())) <= 0');
                })
                //->limit(1)
                ->get([
                    'atributs_producte.id as id',
                    'linia_ventes.created_at as data_compra',
                    'atributs_producte.foto_path as codi_qr',
                    'tipus_producte.nom as tipus_producte',
                    'atributs_producte.tickets_viatges as viatges',
                ]);
      $fotos = Venta_productes::where('id_usuari', Auth::id())
              ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
              ->join('productes', 'linia_ventes.producte', '=', 'productes.id')
              ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
              ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
              ->join('atraccions', 'atraccions.id', '=', 'atributs_producte.id_atraccio')
              ->where('tipus_producte.id', '=', '8')
              ->where('productes.estat', '=', '1')
              ->get([
                  'atributs_producte.id as id',
                  'productes.created_at as created_at',
                  'linia_ventes.created_at as data_compra',
                  'atributs_producte.foto_path as foto_path',
                  'atributs_producte.foto_path as foto_path_aigua',
                  'atributs_producte.thumbnail as thumbnail',
                  'tipus_producte.nom as tipus_producte',
                  'atraccions.nom_atraccio as nom_atraccio',
              ]);
      //return Response::download('storage/tickets_parc/15544714436.png');
      return view('perfil', compact('tickets', 'fotos'));
    }
    public function imgDownload($id)
    {
      $foto = Atributs_producte::find($id);
      return Response::download($foto->foto_path);
    }

    public function edit($id)
    {
       $perfil = User::findOrFail($id);

       return view ('perfil/edit', compact('perfil'));
    }

    public function update(Request $request, $id)
    {

      $perfil = User::findOrFail($id);

      $perfil->nom = $request->get('nom');
      $perfil->cognom1 = $request->get('cognom1');
      $perfil->cognom2 = $request->get('cognom2');
      $perfil->telefon = $request->get('telefon');
      $perfil->adreca = $request->get('adreca');
      $perfil->ciutat = $request->get('ciutat');
      $perfil->provincia = $request->get('provincia');
      $perfil->password = Hash::make($request->get('password'));
      $perfil->codi_postal = $request->get('codi_postal');



      $perfil->update();

      return redirect('views/perfil')->with('info', 'Perfil actualitzat correctament');
    }

    public function contrasenyaView()
    {
      return view('/password/edit');
    }

    public function updatePassword(Request $request)
    {
        $request-> validate([
          'password_old' => 'required',
          'password'=> 'required|confirmed|min:6',
          'password_confirmation' => 'required'
        ]);
        $user = User::find(Auth::id());
        if (Hash::check($request->get('password_old'), Auth::user()->password)) {

        $user->password = Hash::make($request->get('password'));

        $user->update();
      }
      else return redirect('views/password')->with('error', 'Error: Introdueix la contrasenya correcta');

      return redirect('views/perfil')->with('info', 'Contrasenya actualitzada correctament');
    }

    public function destroy($id)
    {
      $perfil = User::findOrFail($id);
      $perfil->email_verified_at = null;
      $perfil->save();
      Auth::logout();
      return redirect('/');
    }

}