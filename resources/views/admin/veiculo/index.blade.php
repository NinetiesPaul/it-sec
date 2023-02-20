@extends('admin.base_index')

@section('tab_one', 'Create')
@section('form')
    <p><strong>Create a vehicle</strong></p>
    <form action="/admin/vehicle" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Type:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Select a type" required>
                    <option value="MOTORCYCLE">Motorcycle</option>
                    <option value="4_DOOR">4 doors</option>
                    <option value="2_DOOR">2 doors</option>
                    <option value="OTHER">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Make:</label>
            <div class="col-md-3">
                <input type="text" name="make" id="make" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Model:</label>
            <div class="col-md-3">
                <input type="text" name="model" id="model" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Year:</label>
            <div class="col-md-3">
                <input type="text" name="year" id="year" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Plate:</label>
            <div class="col-md-3">
                <input type="text" name="license" id="license" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Serial number:</label>
            <div class="col-md-3">
                <input type="text" name="register" id="register" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Color:</label>
            <div class="col-md-3">
                <input type="text" name="color" id="color" class="form-control form-control-sm" required>
            </div>
        </div>


        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Create</button>
    </form>
@endsection

@section('tab_two', 'List')
@section('listing')
    <p><strong>All vehicles</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Type</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Serial number</th>
            <th scope="col">Color</th>
            <th scope="col">Plate</th>
            <th scope="col">Is available?</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <th scope="row">{{$vehicle->id}}</th>
                <td>{{$vehicle->type}}</td>
                <td>{{$vehicle->make}}</td>
                <td>{{$vehicle->model}}</td>
                <td>{{$vehicle->year}}</td>
                <td>{{$vehicle->register}}</td>
                <td>{{$vehicle->color}}</td>
                <td>{{$vehicle->license}}</td>
                <td>{{ ($vehicle->is_available == 1) ? "Yes" : "No" }}</td>
                <td>
                    <a href="vehicle/{{$vehicle->id}}" class="btn btn-sm btn-primary" >Edit</a> 
                    <a href="vehicle/{{$vehicle->id}}/usage" class="btn btn-sm btn-primary" >Usage</a>
                    <a href="vehicle/{{$vehicle->id}}/maintenance" class="btn btn-sm btn-primary" >Maintenance</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
