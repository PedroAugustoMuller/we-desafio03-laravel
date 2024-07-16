<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanosController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function associacao()
    {
        return view('associacao');
    }
}
