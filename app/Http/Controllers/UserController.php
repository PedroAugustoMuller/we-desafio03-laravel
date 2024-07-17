<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Service\UserService;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginApi(LoginRequest $request)
    {
        try{
            $data = [
                'email' => $request->input("email"),
                'cpf' => $request->input("cpf"),
            ];
            $response = UserService::login($data);
            if(array_key_exists("erro", $response)){
                throw new Exception($response['erro']);
            }
            $request->session()->put('token', $response['token']);
            $userData = (array) self::decodeToken();
            $user = new User($userData);
            $request->session()->put('user', $user);
            if(session()->get('idplano') == null){
                return redirect()->route('home');
            }
            return redirect()->route('associacao');
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
    public static function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('login');
    }
}
