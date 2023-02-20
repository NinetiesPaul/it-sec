@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Equipment update</strong></p>
    <form action="/admin/equipment/{{$arma->id}}" method="post" role="form" class="form-horizontal " >
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Type:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Select a type" required>
                    <option value="GUN" {{ ($arma->type === 'GUN') ? "selected" : '' }}>Fire arm</option>
                    <option value="OTHER" {{ ($arma->tipo === 'OTHER') ? "selected" : '' }}>Melee/other</option>
                </select>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Make:</label>
            <div class="col-md-3">
                <input type="text" name="make" id="make" class="form-control form-control-sm" value="{{$arma->make}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Model:</label>
            <div class="col-md-3">
                <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{$arma->model}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="sn" class="col-form-label col-md-2 col-form-label-sm ">Serial number:</label>
            <div class="col-md-3">
                <input type="text" name="sn" id="sn" class="form-control form-control-sm" value="{{$arma->sn}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="notes" class="col-form-label col-md-2 col-form-label-sm ">notes:</label>
            <div class="col-md-3">
                <input type="text" name="notes" id="notes" class="form-control form-control-sm" value="{{$arma->notes}}" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Save</button>
    </form>
@endsection
