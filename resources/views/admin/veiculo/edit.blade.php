@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Alteração de Veiculo</strong></p>
    <form action="/admin/vehicle/{{$veiculo->id}}" method="post" role="form" class="form-horizontal " >
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group row justify-content-center ">
                <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
                <div class="col-md-3">
                    <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                        <option value="MOTORCYCLE" {{ ($veiculo->type === 'MOTORCYCLE') ? 'selected' : '' }}>Moto</option>
                        <option value="4_DOOR" {{ ($veiculo->type === '4_DOOR') ? 'selected' : '' }}>Veiculo 4 portas</option>
                        <option value="2_DOOR" {{ ($veiculo->type === '2_DOOR') ? 'selected' : '' }}>Veiculo 2 portas</option>
                        <option value="OTHER" {{ ($veiculo->type === 'OTHER') ? 'selected' : '' }}>Outro tipo</option>
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
                <div class="col-md-3">
                    <input type="text" name="make" id="make" class="form-control form-control-sm" value="{{$veiculo->make}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
                <div class="col-md-3">
                    <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{$veiculo->model}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Ano:</label>
                <div class="col-md-3">
                    <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{$veiculo->year}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Placa:</label>
                <div class="col-md-3">
                    <input type="text" name="license" id="license" class="form-control form-control-sm" value="{{$veiculo->license}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Renavam:</label>
                <div class="col-md-3">
                    <input type="text" name="register" id="register" class="form-control form-control-sm" value="{{$veiculo->register}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Cor:</label>
                <div class="col-md-3">
                    <input type="text" name="color" id="color" class="form-control form-control-sm" value="{{$veiculo->color}}" required>
                </div>
            </div>


            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection
