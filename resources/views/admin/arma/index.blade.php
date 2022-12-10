@extends('admin.base_index')

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Cadastro de Equipamento</strong></p>
    <form action="/admin/equipment" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                    <option value="GUN">Arma de Fogo</option>
                    <option value="OTHER">Outro</option>
                </select>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
            <div class="col-md-3">
                <input type="text" name="make" id="make" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
            <div class="col-md-3">
                <input type="text" name="model" id="model" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="sn" class="col-form-label col-md-2 col-form-label-sm ">Nº de Série:</label>
            <div class="col-md-3">
                <input type="text" name="sn" id="sn" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="notes" class="col-form-label col-md-2 col-form-label-sm ">Observações:</label>
            <div class="col-md-3">
                <input type="text" name="notes" id="notes" class="form-control form-control-sm" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Todos')
@section('listing')
    <p><strong>Lista de Equipamentos</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Modelo</th>
            <th scope="col">Nº de Série</th>
            <th scope="col">Disponibilidade</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($armas as $arma)
            <tr>
                <th scope="row">{{$arma->id}}</th>
                <td>{{$arma->type}}</td>
                <td>{{$arma->make}}</td>
                <td>{{$arma->model}}</td>
                <td>{{$arma->sn}}</td>
                <td>{{$arma->is_available}}</td>
                <td>
                    <a href="equipment/{{$arma->id}}">Editar</a> |
                    <a href="equipment/{{$arma->id}}/usage">Uso</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
