<x-layout>
    @section('pageTitle','Mensalidades - Portal das Cartas')
    <div class="container py-5" style="justify-content: center">
        <h4 class="text-center mb-5" style="align-items: center"><strong>Mensalidades</strong></h4>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">Mês</th>
            <th scope="col">Data</th>
            <th scope="col">Valor</th>
            <th scope="col">Plano</th>
            <th scope="col">Status</th>
            <th scope="col">PIX</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < 12; $i++)
            <tr class="danger">
                <th scope="row">{{$i+1}}</th>
                <td>{{date("d-m-Y", strtotime("+$i month", time()))}}</td>
                <td>R$ {{session('precoFinal')}}</td>
                <td>{{session('planoContratado')->dscplano}}</td>
                <td style="color: red">Não pago</td>
                <td>{{md5($i)}}</td>
            </tr>
        @endfor
        </tbody>
    </table>
    </div>
</x-layout>
