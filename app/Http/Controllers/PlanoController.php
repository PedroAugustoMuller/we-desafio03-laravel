<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Exception;
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
            if(session()->get('user') != null)
            {
                $data['planoDesconto'] = PlanoService::getDescontoPlanoByUser($data['plano']->idplano);
            }
            if(isset($request['cep']))
            {
                $data['planoDesconto'] = PlanoService::getDescontoPlanoByCEP($request['idplano'],$request['cep']);
            }
            return view('associacao',$data);
        }catch(Exception $e){
            $request->session()->flash('error',$e->getMessage());
            return view('home');
        }

    }
    public function parcelas(Request $request)
    {
        return view('parcelas');
    }
}
