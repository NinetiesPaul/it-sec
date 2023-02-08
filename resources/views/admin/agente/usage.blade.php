@extends('admin.base_index')

@section('script')
    var page = $(location).attr('href');
    if (page.includes("page")){
        $("#cadastrar_form").removeClass('active');
        $("#cadastrar_list").addClass('active');
        $("#cadastrar_form-tab").removeClass('active');
        $("#cadastrar_list-tab").addClass('active');
    }
@endsection

@section('tab_one', 'Equipments')
@section('form')
    <p><strong>Equipment Usage History</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Equipment</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipments as $equipment)
            <tr>
                <td>{{$equipment->equipment->make}} {{$equipment->equipment->model}} <br><small><b>SN:<b>{{$equipment->equipment->sn}}</small></td>
                <td>{{$equipment->started_on}}</td>
                <td>{{$equipment->ended_on}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('tab_two', 'Vehicles')
@section('listing')                    
    <p><strong>Vehicle Usage History</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Vehicle</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{$vehicle->vehicle->make}} {{$vehicle->vehicle->model}} {{$vehicle->vehicle->year}} <br><small><b>Placa:<b>{{$vehicle->vehicle->license}}</small></td>
                <td>{{$vehicle->started_on}}</td>
                <td>{{$vehicle->ended_on}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
