<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PseudoTribes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil');
    }

    public function verIndios(){

      $indios = User::find(Auth::user()->id)->indios; //Este query hace: Select todo de la tabla Usuarios where el id sea igual al usuario logeado. Y luego devuelve a los hijos del usuario logeado, osea los indios que registró. Es igual a "todo de Usuarios where parent_id = user logeado".

      return view('perfil', compact('indios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        return view('agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'parent_id' => Auth::user()->id,
            'name' => $request['name'],
            'surname' => $request['surname'],
            'dni' => $request['dni'],
            'email' => $request['email'],
            'password' => Hash::make($request['dni'] . '_2020')
        ]);

        return redirect('perfil');
    }

    public function detalleIndio($id){
      $indio = User::find($id); //Buscamos en Usuarios el ID que pasamos en la ruta

      if (Auth::user()->id == $indio->parent_id) { //Averiguamos si quien consulta es, efectivamente, el cacique de ese ID (persona)
        return view('detalle', compact('indio')); //Si esa persona es su indio, le devolvemos los datos
      }
      else { //Sino, vaciamos la variable para que tire error.
        $indio = NULL;
        return view('detalle', compact('indio'));
      }
    }

    public function actualizarIndio(Request $request, $id){
      $indio = User::find($id);
      echo "Antes era " . $indio->name;
      $indio->name = $request['name'];
      echo "Ahora es " . $indio->name;
      die();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
