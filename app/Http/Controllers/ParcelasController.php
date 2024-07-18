<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class ParcelasController extends Controller
{
    public function index()
    {
        return view('parcelas');
    }
    public function parcelas(Request $request)
    {
        try {
            if (session()->get('user') == null) {
                session()->flash('error', 'Faça o login para concluir a operação');
                return view('login');
            }
            //SÓ PRA FINGIR QUE TA VERIFICANDO O USUÁRIO NO BANCO
            User::decodeToken();
            if (session('planoSelecionado') != null && isset($request['precoFinal'])) {
                $planoContratado = session('planoSelecionado');
                session()->forget('planoSelecionado');
                $request->session()->put('planoContratado', $planoContratado);
                $request->session()->put('precoFinal', $request['precoFinal']);
                return view('parcelas');
            }
            if(session('planoContratado'))
            {
                return view('parcelas');
            }
            return view('home');

        } catch (ExpiredException $expiredToken) {
            $request->session()->flash('error', 'Sessão expirada, faça login novamento para seguir');
            session()-flush();
            return view('login');
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return view('home');
        }
    }
}
