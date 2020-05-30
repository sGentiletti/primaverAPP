<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tribu;
use Illuminate\Support\Facades\Auth;

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

    static function calculateNumTribu($lastConfirmed)
    {
        if (!$lastConfirmed) {
            return 'SE01';
        }

        $previouLastConfirmed = $lastConfirmed->num_tribu;
        
        $preFix = substr($previouLastConfirmed, 0, 2);
        $num = substr($previouLastConfirmed, 2);

        if($preFix === 'SE') {
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

        $user = Tribu::create([
            'user_id' => Auth::user()->id,
            'num_tribu' =>  $this->calculateNumTribu($lastConfirmed),
        ]);

        return redirect('perfil');
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
