<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Exception;
use Firebase\JWT\ExpiredException;
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
        try {
            if (!isset($request['idplano']) && $request->session()->get('planoSelecionado') == null) {
                return view('associacao');
            }
            if (isset($request['idplano'])) {
                session()->put('planoSelecionado',PlanoService::getPlanoById($request['idplano']));
            }
            $idplano = session()->get('planoSelecionado')->idplano;
            if (session()->get('user') != null) {
                $data['planoDesconto'] = PlanoService::getDescontoPlanoByUser($idplano);
            }
            if (isset($request['cep'])) {
                $data['planoDesconto'] = PlanoService::getDescontoPlanoByCEP($idplano, $request['cep']);
            }
            $data['plano'] = session()->get('planoSelecionado');
            return view('associacao', $data);
        }catch(ExpiredException $expiredToken)
        {
            $request->session()->flash('error','Sessão expirada');
            return view('login');
        }catch(Exception $e){
            $request->session()->flash('error',$e->getMessage());
            return view('home');
        }

    }
    public function parcelas(Request $request)
    {
        if(session()->get('user') == null)
        {
            session()->flash('erro','Faça o login para concluir a operação');
            return view('login');
        }
        if(session()->get('idplano') != null && isset($request['precoFinal'])){
            $planoContratado = session()->get('planoSelecionado');
            session()->forget('planoSelecionado');
            $request->session()->put('planoContratado',$planoContratado);
            $request->session()->put('precoFinal',$request['precoFinal']);
            return view('parcelas');
        }
        return view('home');
    }
}
