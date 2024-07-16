<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function home()
    {
        $data['planos'] = PlanoService::getAllPlanos();
        return view('home',$data);
    }
    public function associacao(Request $request)
    {
        if(!isset($request['idplano']))
        {
            return view('associacao');
        }
        $data['plano'] = PlanoService::getPlanoById($request['idplano']);
        $data['planoDesconto'] = PlanoService::getPlanoById($request['idplano']);
        return view('associacao',$data);
    }
}
