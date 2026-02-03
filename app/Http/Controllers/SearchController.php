<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function showUsers(Request $request){
        $user_id = Session::get('user');
        $input = $request->inputSearch;
        if ($input) {
            $users = User::where([
                ['email', 'ILIKE' ,"%{$input}%"],
                ['id', '!=', $user_id]])->orwhere('pseudo', 'ILIKE' ,"%{$input}%")->get();

            if (!$users) {
               return back()->with('error', 'aucun utilisateur trouvé');
            }
        }
        else
            $users = User::where('id', '!=', $user_id)->get();
            
        return view('search', compact('users'));
    }
}
