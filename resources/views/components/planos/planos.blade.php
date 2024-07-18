@if(isset($planos))
    <div class="container py-5" style="justify-content: center">
        <h4 class="text-center mb-5" style="align-items: center"><strong>Planos</strong></h4>
        <div class="container-planos">
            @foreach($planos as $plano)
                <div class="card" style="width:250px">
                    <img class="card-img-top" src="{{$plano->imagem}}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{$plano->dscplano}}</h4>
                        <p class="card-text">{{$plano->descricao}}</p>
                        <p class="card-text">Mensalidade: R$ {{$plano->valor_mensal}}</p>
                        <form method="post" action="/associacao">
                            @csrf
                            <input type="hidden" name="idplano" value="{{$plano->idplano}}">
                            <input type="submit" class="btn btn-primary" value="Aderir ao plano">
                        </form>
                    </div>
                </div>
            @endforeach
            @else
                <h5>{{session()->get('error')}}</h5>
        </div>
    </div>
@endif
