<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginApi(Request $request)
    {
        try{
            $data = $request->validate([
                'email' => 'required|email|',
                'cpf' => 'required|',
            ]);
            UserService::login($data);
            if(!empty(session()->get('token')))
            {
                return redirect()->back()->with('token', session()->get('token'));
            }
            throw new Exception('Usuário não encontrado');
        }catch(Exception $e){
            return redirect()->route('login')->with('error',$e->getMessage());
        }
    }
}
