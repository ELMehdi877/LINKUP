<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function updateInfo(Request $request){
        $user_id = Session::get('user');
        $request->validate([
            'pseudo' => ['required', 'string', 'min:4', 'unique:users,pseudo,'.$user_id],
            'name'=>['required','string', 'min:3'],
            'email'=>['required', 'email', 'unique:users,email,'.$user_id],
            'bio' => ['nullable', 'string', 'max:500']
        ]);

        $user = User::find($user_id);
        $user->update($request->only(['pseudo', 'name', 'email', 'bio']));
        return redirect('/profile');
        
    }

    public function updatePassword(Request $request){
        $request->validate([
            'new_password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $user_id = Session::get('user');
        $user = User::find($user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect('/profile');
    }

    public function profile(){
        $user_id = Session::get('user');
        $user = User::find($user_id);
        return view('profile', compact('user'));
    }

    public function profilePhoto(Request $request){

        $request->validate([
            'photoProfile' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5000']
        ]);

        $user_id = Session::get('user');
        $user = User::find($user_id);
        //récupérer l'image
        $image = $request->file('photoProfile');

        //non du profile
        $imageName = time().'.'.$image->extension();

        //déplacer vers public/profile_photo
        $image->storeAs('profile_photo', $imageName, 'public' );

        $user->photo = $imageName;
        $user->save(); 
        return redirect('/profile');
    }
    
}
