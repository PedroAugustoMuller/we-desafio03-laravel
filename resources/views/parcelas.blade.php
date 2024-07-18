<x-layout>
    @section('pageTitle','Parcelas - Portal das Cartas')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mês</th>
            <th scope="col">Data</th>
            <th scope="col">Valor</th>
            <th scope="col">Plano</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < 12; $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{date("d-m-Y", strtotime("+$i month", time()))}}</td>
                <td>R$ {{session('precoFinal')}}</td>
                <td>{{session('planoContratado')->dscplano}}</td>
                <td style="color: red">Não pago</td>
            </tr>
        @endfor
        </tbody>
    </table>
</x-layout>
