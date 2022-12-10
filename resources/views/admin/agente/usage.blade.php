@extends('admin.base_index')

@section('script')
    var page = $(location).attr('href');
    if (page.includes("page")){
        $("#cadastrar_form").removeClass('active');
        $("#cadastrar_list").addClass('active');
        $("#cadastrar_form-tab").removeClass('active');
        $("#cadastrar_list-tab").addClass('active');
    }
@endsection

@section('tab_one', 'Equipamentos')
@section('form')
    <p><strong>Historico de Uso de Equipamentos</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Equipamento</th>
            <th scope="col">Inicio de Uso</th>
            <th scope="col">Fim de Uso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($armas as $arma)
            <tr>
                <td>{{$arma->equipment->make}} {{$arma->equipment->model}} <br><small><b>SN:<b>{{$arma->equipment->sn}}</small></td>
                <td>{{$arma->started_on}}</td>
                <td>{{$arma->ended_on}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('tab_two', 'Veiculos')
@section('listing')                    
    <p><strong>Historico de Uso de Veiculos</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Veiculo</th>
            <th scope="col">Inicio de Uso</th>
            <th scope="col">Fim de Uso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($veiculos as $veiculo)
            <tr>
                <td>{{$veiculo->vehicle->make}} {{$veiculo->vehicle->model}} {{$veiculo->vehicle->year}} <br><small><b>Placa:<b>{{$veiculo->vehicle->license}}</small></td>
                <td>{{$veiculo->started_on}}</td>
                <td>{{$veiculo->ended_on}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
