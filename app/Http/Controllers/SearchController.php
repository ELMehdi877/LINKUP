<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function profile(){
        return view('profile');
    }

     public function search(){
        return view('search');
    }
}
