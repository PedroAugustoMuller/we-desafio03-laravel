<?php

namespace App\Service;

use App\Http\Controllers\LoginController;
use App\Models\Plano;
use Exception;
use Illuminate\Support\Facades\Http;

class PlanoService
{
    public static function getAllPlanos(){
        $response = Http::get('https://ah.we.imply.com/pedro/planos')->json();
        if(!$response){
            throw new Exception("Erro ao se comunicar com o servidor");
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
    public static function getDescontoPlano($idPlano)
    {
        $decodedToken = (array)LoginController::decodeToken();
        $userId = $decodedToken['userId'];
        $response = Http::post('https://ah.we.imply.com/pedro/desconto',[
            'idpessoa' => $userId,
            'idplano' => $idPlano,
        ])->json();
        return $response['result']['valor_mensalidade'];
    }
}
