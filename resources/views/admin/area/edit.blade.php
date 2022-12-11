@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Alteração de Área</strong></p>
    <form action="/admin/area/{{$area->id}}" method="post" role="form" class="form-horizontal " >
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group row justify-content-center ">
            <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
            <div class="col-md-3">
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{$area->name}}" required>
            </div>
        </div>

        <div class="form-group row justify-content-center ">
            <label for="description" class="col-form-label col-md-2 col-form-label-sm ">Descrição:</label>
            <div class="col-md-3">
                <input type="text" name="description" id="description" class="form-control form-control-sm" value="{{$area->description}}">
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Ataulizar</button>
    </form>
@endsection
