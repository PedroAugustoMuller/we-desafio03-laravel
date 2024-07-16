<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Plano extends Model
{
    use HasFactory;
    protected $fillable = [
        'idplano',
        'dscplano',
        'descricao',
        'valor_mensal',
        'imagem'
    ];

}
