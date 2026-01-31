<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function search(Request $request){
        $input = $request->inputSearch;
        $user_id = Session::get('user');
        if ($input) {
            $users = User::where('id', '!=', $user_id)
            ->where(function($query) use ($input){
                $query->where('email', $input)->orwhere('pseudo', $input);
            })->get();
            
            return view('search', compact('users'));
        }
        $users = User::where('id', '!=', $user_id)->get();
        return view('search', compact('users'));
    }

    public function showUsers(Request $request){
        
        $input = $request->inputSearch;
        $user = User::where('email',$request->input)->orwhere('pseudo',$request->input);
    
        if (!$user) {
           return back()->with('error', 'aucun utilisateur trouvé');
        }
        return view('search', compact('user'));
    }
}
