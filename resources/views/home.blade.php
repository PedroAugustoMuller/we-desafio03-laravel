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
    @section('pageTitle','Home')
    <style>
        .container-planos {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: minmax(100px, auto);
            gap: 10px;
        }
    </style>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <h4 class="text-center mb-5"><strong>Planos</strong></h4>
            <div class="container-planos">
                @foreach($planos as $plano)
                    <div class="card" style="width:300px">
                        <img class="card-img-top" src="{{$plano->imagem}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$plano->dscplano}}</h4>
                            <p class="card-text">{{$plano->descricao}}</p>
                            <p class="card-text">Mensalidade: R$ {{$plano->valor_mensal}}</p>
                            <form method="post" action="/associacao">
                                @csrf
                                <input type="hidden" name="idplano"value="{{$plano->idplano}}">
                                <input type="submit" class="btn btn-primary" value="Aderir ao plano">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
