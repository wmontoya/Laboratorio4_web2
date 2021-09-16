<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControladorInicioSesion extends Controller
{
    public function iniciar_sesion(Request $request){
        $user = $request->input('txt_user');
        $pass = $request->input('txt_pass');
     
        if(Auth::attempt(['email'=>$user, 'password'=>$pass])){
            return redirect('/');
        }
        return redirect('/inicio');
    }


    public function cerrar_session(Request $request){
        Auth::logout();
        return redirect('/inicio');
    }
}
