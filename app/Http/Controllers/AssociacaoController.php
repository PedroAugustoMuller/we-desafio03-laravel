<?php

namespace App\Http\Controllers;

use App\Service\PlanoService;
use Exception;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class AssociacaoController extends Controller
{
    public function index()
    {
        return view('associacao');
    }
    public function associacao(Request $request)
    {
        try {
            if (!isset($request['idplano']) && $request->session()->get('planoSelecionado') == null) {
                return view('associacao');
            }
            if (isset($request['idplano'])) {
                session()->put('planoSelecionado', PlanoService::getPlanoById($request['idplano']));
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
        } catch (ExpiredException $expiredToken) {
            $request->session()->flash('error', 'Sessão expirada');
            return view('login');
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return view('home');
        }

    }
}
