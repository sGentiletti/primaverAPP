<?php

namespace App\Http\Controllers;

use App\Notifications\ContactoFormularioNotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto');
    }

    public function sendEmail(Request $request){
        $admin = User::where('is_admin', 1)->get();
        Notification::send($admin, new ContactoFormularioNotification($request['mensaje'], $request['email']));
        $flag = 1;
        return view('/contacto', compact('flag'));
    }
}
