<?php
// app/Http/Controllers/TestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function explain()
    {
        $email = 'mehdi@gmail.com';
        $results = DB::select('EXPLAIN SELECT * FROM users WHERE email = ?', [$email]);
        dd($results);
    }
}
