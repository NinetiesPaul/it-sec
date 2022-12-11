@extends('admin.base_index')

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Cadastro de Área</strong></p>
    <form action="/admin/area" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="nome" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
            <div class="col-md-3">
                <input type="text" name="nome" id="nome" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="description" class="col-form-label col-md-2 col-form-label-sm ">Descrição:</label>
            <div class="col-md-3">
                <input type="text" name="description" id="description" class="form-control form-control-sm">
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Todos')
@section('listing')
    <p><strong>Lista de Áreas</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{$area->name}}</td>
                <td>{{$area->description}}</td>
                <td>
                    <a href="area/{{$area->id}}">Editar</a> | 
                    <a href="area/{{$area->id}}/usage">Uso</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
