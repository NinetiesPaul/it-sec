@extends('admin.base_index')

@section('tab_one', 'Create')
@section('form')
    <p><strong>Create new equipment</strong></p>
    <form action="/admin/equipment" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Type:</label>
            <div class="col-md-3">
                <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Select a type" required>
                    <option value="GUN">Arma de Fogo</option>
                    <option value="OTHER">Outro</option>
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
            <label for="sn" class="col-form-label col-md-2 col-form-label-sm ">Serial Number:</label>
            <div class="col-md-3">
                <input type="text" name="sn" id="sn" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="notes" class="col-form-label col-md-2 col-form-label-sm ">Notes:</label>
            <div class="col-md-3">
                <input type="text" name="notes" id="notes" class="form-control form-control-sm" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Save</button>
    </form>
@endsection

@section('tab_two', 'List')
@section('listing')
    <p><strong>All equipments</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Type</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Is available?</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipments as $equipment)
            <tr>
                <th scope="row">{{$equipment->id}}</th>
                <td>{{$equipment->type}}</td>
                <td>{{$equipment->make}}</td>
                <td>{{$equipment->model}}</td>
                <td>{{$equipment->sn}}</td>
                <td>{{ ($equipment->is_available == 1) ? "Yes" : "No" }}</td>
                <td>
                    <a href="equipment/{{$equipment->id}}" class="btn btn-sm btn-primary">Edit</a> 
                    <a href="equipment/{{$equipment->id}}/usage" class="btn btn-sm btn-primary">Usage history</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
