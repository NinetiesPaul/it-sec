@extends('admin.base_index')

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Cadastro de Cliente</strong></p>
    <form action="/admin/client" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
            <div class="col-md-3">
                <input type="text" name="name" id="name" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="email" class="col-form-label col-md-2 col-form-label-sm ">E-mail:</label>
            <div class="col-md-3">
                <input type="text" name="email" id="email" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="password" class="col-form-label col-md-2 col-form-label-sm ">Senha:</label>
            <div class="col-md-3">
                <input type="password" name="password" id="password" class="form-control form-control-sm" required>
            </div>
        </div>

        <hr/>

        <div class="form-group row justify-content-center ">
            <label for="phone1" class="col-form-label col-md-2 col-form-label-sm ">Telefone Residencial:</label>
            <div class="col-md-3">
                <input type="text" name="phone1" id="phone1" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="phone2" class="col-form-label col-md-2 col-form-label-sm ">Telefone Móvel:</label>
            <div class="col-md-3">
                <input type="text" name="phone2" id="phone2" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="profile_picture" class="col-form-label col-md-2 col-form-label-sm ">Avatar:</label>
            <div class="col-md-3">
                <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm" >
            </div>
        </div>

        <hr/>

        <div class="form-group row justify-content-center ">
            <label for="street" class="col-form-label col-md-2 col-form-label-sm ">Rua:</label>
            <div class="col-md-3">
                <input type="text" name="street" id="street" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="number" class="col-form-label col-md-2 col-form-label-sm ">Número:</label>
            <div class="col-md-3">
                <input type="text" name="number" id="number" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail1" class="col-form-label col-md-2 col-form-label-sm ">Bairro:</label>
            <div class="col-md-3">
                <input type="text" name="detail1" id="detail1" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="zip" class="col-form-label col-md-2 col-form-label-sm ">CEP:</label>
            <div class="col-md-3">
                <input type="text" name="zip" id="zip" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="city" class="col-form-label col-md-2 col-form-label-sm ">Cidade:</label>
            <div class="col-md-3">
                <input type="text" name="city" id="city" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail2" class="col-form-label col-md-2 col-form-label-sm ">Complemento:</label>
            <div class="col-md-3">
                <input type="text" name="detail2" id="detail2" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="state_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
            <div class="col-md-3">

                <select name="state_id" id="state_id" class="form-control form-control-sm selectpicker" title="Selecione um estado" required>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" >{{$estado->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Todos')
@section('listing')
    <p><strong>Lista de Clientes</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->user_id}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    <a href="client/{{$usuario->user_id}}">editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
