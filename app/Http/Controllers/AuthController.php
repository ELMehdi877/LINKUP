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
            'pseudo'=>['required','string', 'min:4','unique:users,pseudo'],
            'email'=>['required', 'email', 'unique:users,email'],
            'bio'=>['nullable', 'string', 'max:500'],
            'password'=>'required|min:6|confirmed',
        ]);

        // $userExiste = User::where('email', $request->email)->first();
        // if ($userExiste) {
        //     return back()->with('error', 'Cet email existe déja');
        // }

        

        // dd('Validation OK');
        $user = new User();
        $user->name = $request->name;
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->bio = $request->bio;
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
            return redirect('/search');
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
            return back()->with('error', 'Email incorrect');
        }
        Session::put('user_email', $userExiste->email);
        return redirect('/changepassword');
    }


    public function newpassword(){
        return view('newpassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'new_password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $userEmail = Session::get('user_email');
        $user = User::where('email', $userEmail)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect('/login');
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
