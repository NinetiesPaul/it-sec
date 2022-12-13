@extends('admin.base_index')

@section('tab_one', 'Cadastrar')
@section('form')
    <p><strong>Cadastro de Agente</strong></p>
    <form action="/admin/agent" method="post" role="form" class="form-horizontal">
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
        <div class="form-group row justify-content-center ">
            <label for="area_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
            <div class="col-md-3">

                <select name="area_id" id="area_id" class="form-control form-control-sm selectpicker" title="Selecione uma área">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}" >{{$area->name}}</option>
                    @endforeach
                </select>
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
                    @foreach($states as $state)
                        <option value="{{$state->id}}" >{{$state->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Todos')
@section('listing')
    <p><strong>Lista de Agentes</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Contratado Em</th>
            <th scope="col">Demitido Em</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $agent)
            <tr>
                <th scope="row">{{$agent->user->id}}</th>
                <td>{{ $agent->user->name }}</td>
                <td>{{ $agent->user->email }}</td>
                <td>{{ \Carbon\Carbon::parse($agent->admitted_in)->format('d/m/Y') }}</td>
                <td>{{( isset($agent->terminated_at)) ? \Carbon\Carbon::parse($agent->terminated_at)->format('d/m/Y') : '' }}</td>
                <td>
                    <a href="agent/{{$agent->user->id}}">editar</a> | <a href="agent/{{$agent->id}}/usage">uso</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
