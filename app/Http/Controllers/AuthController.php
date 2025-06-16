<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    
    public function index()
    {
        return view('admin-paste.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();         
            
             return redirect()->intended('/admin');        
        }

        return back()->with('status', 'Usuário ou senha incorretos!');
    }

    public function create() 
    {
        return view('admin-paste.registrar');
    }

    public function forgotPassword()
    {
        return view('admin-paste.login'); // ou a view correta para redefinição de senha
    }
}
