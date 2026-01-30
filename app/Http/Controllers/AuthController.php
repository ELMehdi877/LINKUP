<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Mime\Email;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required','string', 'min:3'],
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>'required|min:6|confirmed',
        ]);

        // $userExiste = User::where('email', $request->email)->first();
        // if ($userExiste) {
        //     return back()->with('error', 'Cet email existe déja');
        // }

        

        // dd('Validation OK');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login')->with('success','inscription réussite !');

    }

    public function authenticate(Request $request){
        
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user->id);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email ou mot de passe incorrect');
    }


    public function forgot(){
        return view('forgot');
    }

    public function checkEmail(Request $request){
        $request->validate([
            'email'=> ['required', 'string', 'email']
        ]);

        $userExiste = User::where('email', $request->email)->first();

        if (!$userExiste) {
            return back()->with('error', 'Cet email n\'éxiste pas');
        }
        return redirect('/changepassword');
    }


    public function newpassword(){
        return view('newpassword');
    }

    public function updatePassword(Request $request){

    }

    public function dashboard(){
        if (!Session::has('user')) {
            return redirect('/login')->with('error', 'connectez vous d\'abord ');
        }
        return view('dashboard');
    }

    public function logout(){
        Session::forget('user');
        return redirect('/login')->with('success', 'Déconnexion réussie !');
    }

    public function landingpage(){
        return view('/landingpage');
    }
}
