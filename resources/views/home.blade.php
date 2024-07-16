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
    <section style="background-color: #eee;">
        <div class="container py-5">
            <h4 class="text-center mb-5"><strong>Planos</strong></h4>
            <div class="container-planos">
                @foreach($planos as $plano)
                    <div class="card" style="width:300px">
                        <img class="card-img-top" src="{{$plano->imagem}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$plano->getTitulo()}}</h4>
                            <p class="card-text">{{$plano->getDescricao()}}</p>
                            <p class="card-text">Mensalidade: R$ {{$plano->getValor()}}</p>
                            <form method="POST" action="/plano">
                                <input type="hidden" value="{{$plano->getId()}}" name="idplano">
                                <input type="submit" class="btn btn-primary" value="Aderir ao plano">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
