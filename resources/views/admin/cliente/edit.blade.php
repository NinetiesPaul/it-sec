@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Alteração de Cliente</strong></p>
    <form action="/admin/client/{{$usuario->id}}" method="post" role="form" class="form-horizontal " >
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="address_id" value="{{$usuario->address_id}}">
        <input type="hidden" name="user_id" value="{{$usuario->id}}">

        <div class="form-group row justify-content-center ">
            <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
            <div class="col-md-3">
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{$usuario->name}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="email" class="col-form-label col-md-2 col-form-label-sm ">E-mail:</label>
            <div class="col-md-3">
                <input type="text" name="email" id="email" class="form-control form-control-sm" value="{{$usuario->email}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="password" class="col-form-label col-md-2 col-form-label-sm ">Senha:</label>
            <div class="col-md-3">
                <input type="password" name="password" id="password" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="area_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
            <div class="col-md-3">

                <select name="area_id" id="area_id" class="form-control form-control-sm selectpicker" title="Selecione uma área">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}" {{($area->id === $usuario->isClient->area_id) ? 'selected' : '' }} >{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr/>

        <div class="form-group row justify-content-center ">
            <label for="phone1" class="col-form-label col-md-2 col-form-label-sm ">Telefone Residencial:</label>
            <div class="col-md-3">
                <input type="text" name="phone1" id="phone1" class="form-control form-control-sm" value="{{$usuario->phone1}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="phone2" class="col-form-label col-md-2 col-form-label-sm ">Telefone Móvel:</label>
            <div class="col-md-3">
                <input type="text" name="phone2" id="phone2" class="form-control form-control-sm" value="{{$usuario->phone2}}" >
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
                <input type="text" name="street" id="street" class="form-control form-control-sm" value="{{$usuario->address->street}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="number" class="col-form-label col-md-2 col-form-label-sm ">Número:</label>
            <div class="col-md-3">
                <input type="text" name="number" id="number" class="form-control form-control-sm" value="{{$usuario->address->number}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail1" class="col-form-label col-md-2 col-form-label-sm ">Bairro:</label>
            <div class="col-md-3">
                <input type="text" name="detail1" id="detail1" class="form-control form-control-sm" value="{{$usuario->address->detail1}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="zip" class="col-form-label col-md-2 col-form-label-sm ">CEP:</label>
            <div class="col-md-3">
                <input type="text" name="zip" id="zip" class="form-control form-control-sm" value="{{$usuario->address->zip}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="city" class="col-form-label col-md-2 col-form-label-sm ">Cidade:</label>
            <div class="col-md-3">
                <input type="text" name="city" id="city" class="form-control form-control-sm" value="{{$usuario->address->city}}" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail2" class="col-form-label col-md-2 col-form-label-sm ">Complemento:</label>
            <div class="col-md-3">
                <input type="text" name="detail2" id="detail2" class="form-control form-control-sm" value="{{$usuario->address->detail2}}">
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="state_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
            <div class="col-md-3">

                <select name="state_id" id="state_id" class="form-control form-control-sm selectpicker" title="Selecione um estado" required>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}" {{($estado->id === $usuario->address->state_id) ? 'selected' : '' }}>{{$estado->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Atualizar</button>
    </form>
@endsection
