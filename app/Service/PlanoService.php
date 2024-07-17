<?php

namespace App\Service;

use App\Http\Controllers\UserController;
use App\Models\Plano;
use Exception;
use Illuminate\Support\Facades\Http;

class PlanoService
{
    public static function getAllPlanos(){
        $response = Http::get('https://ah.we.imply.com/pedro/planos')->json()['result'];
        if(isset($response['erro'])){
            throw new Exception($response['erro']);
        }
        $planos = array();
        foreach ($response as $plano) {
            $planos[$plano['idplano']] = new Plano($plano);
        }
            return $planos;
    }
    public static function getPlanoById($id){
        $reponse = self::getAllPlanos();
        return $reponse[$id];
    }
    public static function getDescontoPlanoByUser($idPlano)
    {
        $userId = session()->get("user")->userId;
        $response = Http::post('https://ah.we.imply.com/pedro/desconto',[
            'idpessoa' => $userId,
            'idplano' => $idPlano,
        ])->json();
        if(isset($response['erro']))
        {
            throw new Exception($response['erro']);
        }
        return $response['result']['valor_mensalidade'];
    }
    public static function getDescontoPlanoByCEP($idPlano,$cep)
    {
        $cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
        $response = Http::post('https://ah.we.imply.com/pedro/desconto',[
            'cep' => $cep,
            'idplano' => $idPlano,
        ])->json()['result'];
        if(isset($response['erro']))
        {
            throw new Exception($response['erro']);
        }
        return $response['valor_mensalidade'];
    }
}
