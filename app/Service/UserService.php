<?php

namespace App\Service;

use Exception;
use http\Env\Request;
use Illuminate\Support\Facades\Http;

class UserService
{
    public static function login($data)
    {
        $response = Http::post('https://ah.we.imply.com/pedro/login',[
            'email' => $data['email'],
            'cpf' => $data['cpf'],
        ])->json();
        return $response['result'];
    }
    public static function logout($data)
    {

    }
}
