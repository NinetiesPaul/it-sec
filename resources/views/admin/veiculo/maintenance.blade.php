@extends('admin.base_index')

@section('datepicker')
    $( function() {
        $( "#started_on" ).datepicker(); // { dateFormat: 'dd/mm/yy' }
        $( "#ended_on" ).datepicker(); // { dateFormat: 'dd/mm/yy' }
    } );
@endsection

@section('script')
    $('#cost').mask('000.000.000.000.000,00', {reverse: true});

    var page = $(location).attr('href');
    if (page.includes("page")){
        $("#cadastrar_form").removeClass('active');
        $("#cadastrar_list").addClass('active');
        $("#cadastrar_form-tab").removeClass('active');
        $("#cadastrar_list-tab").addClass('active');
    }
@endsection

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Atribuição de Veiculo</strong></p>
    <form action="/admin/vehicle/{{$veiculoId}}/maintenance" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="started_on" class="col-form-label col-md-2 col-form-label-sm ">Data de Inicio:</label>
            <div class="col-md-3">
                <input type="text" name="started_on" id="started_on" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="ended_on" class="col-form-label col-md-2 col-form-label-sm ">Data de Fim:</label>
            <div class="col-md-3">
                <input type="text" name="ended_on" id="ended_on" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="location" class="col-form-label col-md-2 col-form-label-sm ">Local:</label>
            <div class="col-md-3">
                <input type="text" name="location" id="location" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="cost" class="col-form-label col-md-2 col-form-label-sm ">Valor:</label>
            <div class="col-md-3">
                <input type="text" name="cost" id="cost" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="description" class="col-form-label col-md-2 col-form-label-sm ">Descrição:</label>
            <div class="col-md-3">
                <input type="text" name="description" id="description" class="form-control form-control-sm" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection
                    
@section('tab_two', 'Atribuir')
@section('listing')
    <p><strong>Historico de Manutenção de Veiculo</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Data de Inicio</th>
            <th scope="col">Data de Fim</th>
            <th scope="col">Local</th>
            <th scope="col">Valor</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historicos as $historico)
            <tr>
                <td>{{$historico->started_on}}</td>
                <td>{{$historico->ended_on}}</td>
                <td>{{$historico->location}}</td>
                <td>R$ {{number_format($historico->cost, 2, ",", ".")}}</td>
                <td>{{$historico->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $historicos->links('pagination::bootstrap-4') }}
@endsection
