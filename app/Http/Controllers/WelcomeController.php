<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = DB::select('select * from posts');
        return view('welcome', [
            'posts' => $posts
        ]);
    }
}
