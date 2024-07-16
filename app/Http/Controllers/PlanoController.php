<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function home()
    {
        $data['planos'] = PlanoService::getAll();
        return view('home',$data);
    }
    public function associacao(Request $request)
    {
        dd($request);
        return view('associacao');
    }
}
