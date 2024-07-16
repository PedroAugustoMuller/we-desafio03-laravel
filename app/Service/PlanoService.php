<?php

namespace App\Service;

use App\Models\Plano;
use Illuminate\Support\Facades\Http;

class PlanoService
{
    public static function getAllPlanos(){
        $response = Http::get('https://ah.we.imply.com/pedro/planos')->json()['result'];
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
    public static function getDescontoPlano($id)
    {

    }
}
