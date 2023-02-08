@extends('admin.base_index')

@section('tab_one', 'Create')
@section('form')
    <p><strong>Create a client</strong></p>
    <form action="/admin/client" method="post" role="form" class="form-horizontal">
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Name:</label>
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
            <label for="password" class="col-form-label col-md-2 col-form-label-sm ">Password:</label>
            <div class="col-md-3">
                <input type="password" name="password" id="password" class="form-control form-control-sm" required>
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="area_id" class="col-form-label col-md-2 col-form-label-sm ">Area:</label>
            <div class="col-md-3">

                <select name="area_id" id="area_id" class="form-control form-control-sm selectpicker" title="Select an area">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}" >{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr/>

        <div class="form-group row justify-content-center ">
            <label for="phone1" class="col-form-label col-md-2 col-form-label-sm ">Home phone number:</label>
            <div class="col-md-3">
                <input type="text" name="phone1" id="phone1" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="phone2" class="col-form-label col-md-2 col-form-label-sm ">Mobile phone number:</label>
            <div class="col-md-3">
                <input type="text" name="phone2" id="phone2" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="profile_picture" class="col-form-label col-md-2 col-form-label-sm ">Profile picture:</label>
            <div class="col-md-3">
                <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm" >
            </div>
        </div>

        <hr/>

        <div class="form-group row justify-content-center ">
            <label for="street" class="col-form-label col-md-2 col-form-label-sm ">Street:</label>
            <div class="col-md-3">
                <input type="text" name="street" id="street" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="number" class="col-form-label col-md-2 col-form-label-sm ">Number:</label>
            <div class="col-md-3">
                <input type="text" name="number" id="number" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail1" class="col-form-label col-md-2 col-form-label-sm ">Detail 1:</label>
            <div class="col-md-3">
                <input type="text" name="detail1" id="detail1" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="zip" class="col-form-label col-md-2 col-form-label-sm ">Zip code:</label>
            <div class="col-md-3">
                <input type="text" name="zip" id="zip" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="city" class="col-form-label col-md-2 col-form-label-sm ">City:</label>
            <div class="col-md-3">
                <input type="text" name="city" id="city" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="detail2" class="col-form-label col-md-2 col-form-label-sm ">Detail 2:</label>
            <div class="col-md-3">
                <input type="text" name="detail2" id="detail2" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="state_id" class="col-form-label col-md-2 col-form-label-sm ">State:</label>
            <div class="col-md-3">

                <select name="state_id" id="state_id" class="form-control form-control-sm selectpicker" title="Select a state" required>
                    @foreach($states as $state)
                        <option value="{{$state->id}}" >{{$state->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Save</button>
    </form>
@endsection

@section('tab_two', 'List')
@section('listing')
    <p><strong>All clients</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->user->id}}</th>
                <td>{{$user->user->name}}</td>
                <td>{{$user->user->email}}</td>
                <td>
                    <a href="client/{{$user->user->id}}" class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
