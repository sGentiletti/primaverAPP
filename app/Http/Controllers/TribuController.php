<?php

namespace App\Http\Controllers;

use App\Notifications\TribuConfirmadaNotification;
use App\Notifications\PreinscripcionManual;
use Illuminate\Http\Request;
use App\User;
use App\Tribu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TribuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public static function calculateNumTribu($lastConfirmed)
    {
        if (!$lastConfirmed) {
            return 'SE01';
        }

        $previousLastConfirmed = $lastConfirmed->num_tribu;
        
        $preFix = substr($previousLastConfirmed, 0, 2);
        $num = substr($previousLastConfirmed, 2);

        if ($preFix === 'SE') {
            return 'JU' . $num;
        } else {
            $newNumTribu = 'SE' . str_pad(($num + 1), 2, "0", STR_PAD_LEFT);
            return $newNumTribu;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $lastConfirmed = Tribu::orderByDesc('id')->first();

        $tribu = Tribu::create([
            'user_id' => Auth::user()->id,
            'num_tribu' =>  $this->calculateNumTribu($lastConfirmed),
        ]);
        //Notificamos a todos los usuarios.
        //Primero al cacique
        $user = User::find($tribu->user_id);
        $user->notify(new TribuConfirmadaNotification());
        //Despues buscamos a sus indios y los notificamos tambien.
        $indios = $user->indios;
        Notification::send($indios, new TribuConfirmadaNotification());
 

        return redirect('perfil');
    }

    public function confirmacionManual($id){
        $lastConfirmed = Tribu::orderByDesc('id')->first();

        $tribu = Tribu::create([
            'user_id' => $id,
            'num_tribu' =>  $this->calculateNumTribu($lastConfirmed),
        ]);
        //Notificamos a todos los usuarios.
        //Primero al cacique
        $user = User::find($tribu->user_id);
        $user->notify(new PreinscripcionManual());
        //Despues buscamos a sus indios y los notificamos tambien.
        $indios = $user->indios;
        Notification::send($indios, new PreinscripcionManual());
 

        return back();
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
