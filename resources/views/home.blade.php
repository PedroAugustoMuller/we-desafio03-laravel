<?php

//session_start();
//use Imply\ListaDesafios03\controller\PlanoController;
//
//$planoController = new PlanoController();
//$planos = $planoController->listarPlanos();
//if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idplano']))
//{
//    $_SESSION['idplano'] = $_POST['idplano'];
//    header('location: /associacao');
//}
//?><!---->
<x-layout>
    @section('pageTitle','Home - Portal das Cartas')
    <style>
        .container-planos {
            max-width: 1200px;
            margin: 0 auto auto 70px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: minmax(100px, auto);
            gap: 10px;
        }
    </style>
    <section style="background-color: #eee;">
        <x-planos.planos :planos="$planos??null"></x-planos.planos>
    </section>
</x-layout>
