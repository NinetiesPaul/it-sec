@extends('admin.base_index')

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Cadastro de Veiculo</strong></p>
    <form action="/admin/vehicle" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                    <option value="MOTORCYCLE">Moto</option>
                    <option value="4_DOOR">Veiculo 4 portas</option>
                    <option value="2_DOOR">Veiculo 2 portas</option>
                    <option value="OTHER">Outro tipo</option>
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
            <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Ano:</label>
            <div class="col-md-3">
                <input type="text" name="year" id="year" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Placa:</label>
            <div class="col-md-3">
                <input type="text" name="license" id="license" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Renavam:</label>
            <div class="col-md-3">
                <input type="text" name="register" id="register" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Cor:</label>
            <div class="col-md-3">
                <input type="text" name="color" id="color" class="form-control form-control-sm" required>
            </div>
        </div>


        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Todos')
@section('listing')
    <p><strong>Lista de Veiculos</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Modelo</th>
            <th scope="col">Ano</th>
            <th scope="col">Renavam</th>
            <th scope="col">Cor</th>
            <th scope="col">Placa</th>
            <th scope="col">Disponível</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($veiculos as $veiculo)
            <tr>
                <th scope="row">{{$veiculo->id}}</th>
                <td>{{$veiculo->type}}</td>
                <td>{{$veiculo->make}}</td>
                <td>{{$veiculo->model}}</td>
                <td>{{$veiculo->year}}</td>
                <td>{{$veiculo->register}}</td>
                <td>{{$veiculo->color}}</td>
                <td>{{$veiculo->license}}</td>
                <td>{{$veiculo->is_available}}</td>
                <td>
                    <a href="vehicle/{{$veiculo->id}}">Editar</a> |
                    <a href="vehicle/{{$veiculo->id}}/usage">Uso</a> |
                    <a href="vehicle/{{$veiculo->id}}/maintenance">Manutenção</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
