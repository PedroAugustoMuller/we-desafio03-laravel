<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function home(Request $request)
    {
        try{
            $data['planos'] = PlanoService::getAllPlanos();
            return view('home',$data);
        }catch(Exception $e){
            $request->session()->flash('error',$e->getMessage());
            return view('home');
        }
    }
    public function associacao(Request $request)
    {
        try{
            if(!isset($request['idplano']) && $request->session()->get('idplano') == null)
            {
                return view('associacao');
            }
            if(isset($request['idplano']))
            {
                $request->session()->put('idplano',$request['idplano']);
            }
            $data['plano'] = PlanoService::getPlanoById(session()->get('idplano'));
            $data['planoDesconto'] = PlanoService::getDescontoPlano(session()->get('idplano'));
            return view('associacao',$data);
        }catch(Exception $e){
            $request->session()->flash('error',$e->getMessage());
            return view('home');
        }

    }
    public function parcelas(Request $request)
    {
        try{
            if($request->session()->get('idplano') == null && !$request->session()->get('contratou'))
            {
                return view('parcelas');
            }
        }catch(Exception $e){
            $request->session()->flash('error',$e->getMessage());
            return view('home');
        }
    }
}
