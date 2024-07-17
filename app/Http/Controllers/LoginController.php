<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
            $token = UserService::login($data);
            $request->session()->put('token', $token);
            if(!empty(session()->get('token')))
            {
                return redirect()->back();
            }
            throw new Exception('Usuário não encontrado');
        }catch(Exception $e){
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('login');
        }
    }

    public static function decodeToken()
    {
        $token = session()->get('token');
        $key = 'UGVkcm8gQXVndXN0byBNdWxsZXI=';
        return JWT::decode($token, new Key($key, 'HS256'));
    }
}
