@extends('admin.base_index')

@section('datepicker')
    $( function() {
        $( "#started_on" ).datepicker(); // { dateFormat: 'dd/mm/yy' }
        $( "#ended_on" ).datepicker(); // { dateFormat: 'dd/mm/yy' }
    } );
@endsection

@section('script')
    $('#cost').mask('000.000.000.000.000,00', {reverse: true});

    var page = $(location).attr('href');
    if (page.includes("page")){
        $("#cadastrar_form").removeClass('active');
        $("#cadastrar_list").addClass('active');
        $("#cadastrar_form-tab").removeClass('active');
        $("#cadastrar_list-tab").addClass('active');
    }
@endsection

@section('tab_one', 'Create')
@section('form')
    <p><strong>Register maintenance for <i>{{$vehicle->model}} {{$vehicle->year}} {{$vehicle->license}}</i></strong></p>
    <form action="/admin/vehicle/{{$vehicleId}}/maintenance" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="started_on" class="col-form-label col-md-2 col-form-label-sm ">Started on:</label>
            <div class="col-md-3">
                <input type="text" name="started_on" id="started_on" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="ended_on" class="col-form-label col-md-2 col-form-label-sm ">Ended on:</label>
            <div class="col-md-3">
                <input type="text" name="ended_on" id="ended_on" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="location" class="col-form-label col-md-2 col-form-label-sm ">Location:</label>
            <div class="col-md-3">
                <input type="text" name="location" id="location" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="cost" class="col-form-label col-md-2 col-form-label-sm ">Cost:</label>
            <div class="col-md-3">
                <input type="text" name="cost" id="cost" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row justify-content-center ">
            <label for="description" class="col-form-label col-md-2 col-form-label-sm ">Description:</label>
            <div class="col-md-3">
                <input type="text" name="description" id="description" class="form-control form-control-sm" >
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Create</button>
    </form>
@endsection
                    
@section('tab_two', 'List')
@section('listing')
    <p><strong>Maintenance history of <i>{{$vehicle->model}} {{$vehicle->year}} {{$vehicle->license}} </i></strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Started on</th>
            <th scope="col">Ended on</th>
            <th scope="col">Location</th>
            <th scope="col">Cost</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($histories as $history)
            <tr>
                <td>{{$history->started_on}}</td>
                <td>{{$history->ended_on}}</td>
                <td>{{$history->location}}</td>
                <td>R$ {{number_format($history->cost, 2, ",", ".")}}</td>
                <td>{{$history->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $histories->links('pagination::bootstrap-4') }}
@endsection
