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
        return view('my-account');
    }

    public function verIndios(){
      $indios = User::where("parent_id", "=", Auth::user()->id)->get(); //Este query hace: Select todo de la tabla Usuarios where el parent_id sea igual al usuario logeado. (Devuelve los hijos del usuario logeado, osea los indios que registró)

      return view('my-account', compact('indios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-indian');
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

        // $pseudoTribe = PseudoTribes::create([
        //     'cacique_id' => Auth::user()->id,
        //     'user_id' => $user->id
        // ]);

        return redirect('mi-cuenta');
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
