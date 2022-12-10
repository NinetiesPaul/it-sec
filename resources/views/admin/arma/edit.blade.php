@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Alteração de Equipamento</strong></p>
    <form action="/admin/equipment/{{$arma->id}}" method="post" role="form" class="form-horizontal " >
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                    <option value="GUN" {{ ($arma->type === 'GUN') ? "selected" : '' }}>Arma de fogo</option>
                    <option value="OTHER" {{ ($arma->tipo === 'OTHER') ? "selected" : '' }}>Outro</option>
                </select>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
            <div class="col-md-3">
                <input type="text" name="make" id="make" class="form-control form-control-sm" value="{{$arma->make}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
            <div class="col-md-3">
                <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{$arma->model}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="sn" class="col-form-label col-md-2 col-form-label-sm ">Nº de Série:</label>
            <div class="col-md-3">
                <input type="text" name="sn" id="sn" class="form-control form-control-sm" value="{{$arma->sn}}" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="notes" class="col-form-label col-md-2 col-form-label-sm ">Observações:</label>
            <div class="col-md-3">
                <input type="text" name="notes" id="notes" class="form-control form-control-sm" value="{{$arma->notes}}" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection
