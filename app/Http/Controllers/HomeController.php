<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\PlanoService;
use Exception;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        try {
            $data['planos'] = PlanoService::getAllPlanos();
            return view('home', $data);
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return view('home');
        }
    }
}
