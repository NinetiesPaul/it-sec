@extends('admin.base_edit')

@section('editing_form')
    <p><strong>Vehicle update</strong></p>
    <form action="/admin/vehicle/{{$vehicle->id}}" method="post" role="form" class="form-horizontal " >
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group row justify-content-center ">
                <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Type:</label>
                <div class="col-md-3">
                    <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Select a type" required>
                        <option value="MOTORCYCLE" {{ ($vehicle->type === 'MOTORCYCLE') ? 'selected' : '' }}>Motorcycle</option>
                        <option value="4_DOOR" {{ ($vehicle->type === '4_DOOR') ? 'selected' : '' }}>4 doors</option>
                        <option value="2_DOOR" {{ ($vehicle->type === '2_DOOR') ? 'selected' : '' }}>2 doors</option>
                        <option value="OTHER" {{ ($vehicle->type === 'OTHER') ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Make:</label>
                <div class="col-md-3">
                    <input type="text" name="make" id="make" class="form-control form-control-sm" value="{{$vehicle->make}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Model:</label>
                <div class="col-md-3">
                    <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{$vehicle->model}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Year:</label>
                <div class="col-md-3">
                    <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{$vehicle->year}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Plate:</label>
                <div class="col-md-3">
                    <input type="text" name="license" id="license" class="form-control form-control-sm" value="{{$vehicle->license}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Serial number:</label>
                <div class="col-md-3">
                    <input type="text" name="register" id="register" class="form-control form-control-sm" value="{{$vehicle->register}}" required>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Cor:</label>
                <div class="col-md-3">
                    <input type="text" name="color" id="color" class="form-control form-control-sm" value="{{$vehicle->color}}" required>
                </div>
            </div>


            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Save</button>
    </form>
@endsection
