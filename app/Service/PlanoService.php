<?php

namespace App\Service;

use App\Models\Plano;
use Illuminate\Support\Facades\Http;

class PlanoService
{
    public static function getAll()
    {
        $response = Http::get('https://ah.we.imply.com/pedro/planos')->json()['result'];
        $planos = array();
        foreach ($response as $plano) {
            $planos[] = new Plano($plano);
        }
            return $planos;
    }
    public function getDescontoPlano($data)
    {

    }
}
