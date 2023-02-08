@extends('admin.base_index')

@section('tab_one', 'Create')
@section('form')
    <p><strong>Create new area</strong></p>
    <form action="/admin/area" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Name:</label>
            <div class="col-md-3">
                <input type="text" name="name" id="name" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="description" class="col-form-label col-md-2 col-form-label-sm ">Description:</label>
            <div class="col-md-3">
                <input type="text" name="description" id="description" class="form-control form-control-sm">
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Save</button>
    </form>
@endsection

@section('tab_two', 'List')
@section('listing')
    <p><strong>All areas</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{$area->name}}</td>
                <td>{{$area->description}}</td>
                <td>
                    <a href="area/{{$area->id}}" class="btn btn-sm btn-primary">Edit</a> 
                    <a href="area/{{$area->id}}/usage" class="btn btn-sm btn-primary">Assignment history</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
