@if(isset($plano))
    <div class="d-flex justify-content-left mb-5">
        <h6 class="text-uppercase" style="margin-right:10px">Mensalidade:</h6>
        @if(isset($planoDesconto) && $planoDesconto < $plano->valor_mensal)
                <h6 data-toggle="tooltip" title="Desconto por distância" style="color: green; margin-right: 10px">OFF {{100-$planoDesconto*100/$plano->valor_mensal}}%</h6>
                <h6>R$ {{$planoDesconto}}</h6>
        @else
            <h6>R${{$plano->valor_mensal}}</h6>
        @endif
    </div>
    <form class="form-inline" action="{{route('associacao')}}">
        @if(session()->get('user') != null)
            <span data-toggle="tooltip" title="CEP já Cadastrado">CEP</span>
            <input type="password" class="form-control" id="inputCEP" placeholder="{{session()->get('user')->cep}}" disabled>
        @else
            <span>CEP</span>
            <input type="text" class="form-control" id="inputCEP" name="cep" placeholder="CEP">
            <input type="submit" class="btn btn-primary mb-2" style="margin-top: 5px" value="Verificar Desconto" >
        @endif

    </form>
    <form style="margin-top: 20px" method="post" action="{{route('parcelas')}}">
        @csrf
        <input type="hidden" name="precoFinal" value="{{$planoDesconto??$plano->valor_mensal}}">
        <input type="submit" data-mdb-button-init data-mdb-ripple-init
               class="btn btn-dark btn-block btn-lg"
               data-mdb-ripple-color="dark" value="Finalizar Associação">
    </form>
@else
    <input disabled type="submit" data-mdb-button-init data-mdb-ripple-init
           class="btn btn-dark btn-block btn-lg"
           data-mdb-ripple-color="dark" value="Finalizar Associação">
@endif
