<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Storage;
use File;
use Auth;
use View;
use Image;
use PDF;
use Carbon;
use \App\Promocions;

class PromocionsController extends Controller
{
    /**
     * Mostra una llista amb els registres
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $promocions = Promocions::join('users', 'users.id', '=', 'promocions.id_usuari')
        ->select('promocions.id', 'titol', 'descripcio', 'users.nom', 'users.cognom1', 'users.cognom2', 'users.numero_document', 'path_img')
        ->orderBy('id', 'DESC')
        ->paginate(10);
      return view('gestio.promocions.index', compact('promocions'));

    }

    /**
     * Mostra un formulari per a crear registres
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestio/promocions/create');
    }

    /**
     * Guarda registres nous
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      if ($request->has('image')) {
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/promocions';
        $file->move($file_path, $file_name);
        $foto_up = "/".$file_path."/".$file_name;
      }else {
        $foto_up = "";
      }
      $promocio = new Promocions([
          'titol' => $request->get('titol'),
          'descripcio' => $request->get('descripcio'),
          'id_usuari' => Auth::id(),
          'path_img' => $foto_up
      ]);
      $promocio ->save();
      return redirect('/gestio/promocions')->with('info', 'Promoció registrada correctament');

    }

    /**
     * Mostra el registre especificat
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocio = promocions::find($id);
        return View::make('gestio.promocions.show')
            ->with('promocio', $promocio);
    }

    /**
     *  Mostra el formulari per editar el registre
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocio = promocions::find($id);
        return view('gestio/promocions/edit', compact('promocio'));

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
      $promocio = Promocions::find($id);
      $promocio->titol = $request->get('titol');
      $promocio->descripcio = $request->get('descripcio');
      if ($request->has('image')) {
        $image_path = public_path().$promocio->path_img;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/promocions';
        $file->move($file_path, $file_name);

        $promocio->path_img = "/".$file_path."/".$file_name;
      }
        $promocio->save();
        return redirect('/gestio/promocions')->with('info', 'Promoció modificada');
    }

    /**
     * Elimina el registre especificat de la BBDD
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $promocio = Promocions::find($id);
      $promocio->delete();
      return redirect('/gestio/promocions') ->with('info', 'Promoció eliminada');
    }

    public function guardarPDF()
    {
      $promocions = Promocions::join('users', 'users.id', '=', 'promocions.id_usuari')
        ->select('promocions.id', 'titol', 'descripcio', 'users.nom', 'users.cognom1', 'users.cognom2', 'users.numero_document', 'path_img')
        ->orderBy('id', 'DESC')
        ->paginate(10);

        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        $prom = Promocions::all();
        $pdf = PDF::loadView('/gestio/promocions/pdf', compact('promocions'));
        return $pdf->download('prom'.$temps.'.pdf');

    }
}
