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

@section('tab_one', 'Assign')
@section('form')
    <p><strong>Assign area <i>{{ $area->name }}</i> to agent</strong></p>
    <form action="/admin/area/{{$area->id}}/assign" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="agent_id" class="col-form-label col-md-2 col-form-label-sm ">Agent:</label>
            <div class="col-md-3">
                <select name="agent_id" id="agent_id" class="form-control form-control-sm selectpicker" title="Select an agent" required>
                    @foreach($agents as $agent)
                        <option value="{{$agent->id}}" >{{ $agent->user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Register</button>
    </form>
@endsection

@section('tab_two', 'Designation history')
@section('listing')
    <p><strong>Designation history by agent</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Designated to Agent</th>
            <th scope="col">Patrol started on</th>
            <th scope="col">Patrol ended on</th>
        </tr>
        </thead>
        <tbody>
        @foreach($assignments as $assignment)
            <tr>
                <td>{{$assignment->agent->user->name}}</td>
                <td>{{ \Carbon\Carbon::parse($assignment->started_on)->format('d/m/Y') }}</td>
                <td>{{( isset($assignment->ended_on)) ? \Carbon\Carbon::parse($assignment->ended_on)->format('d/m/Y') : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $assignments->links('pagination::bootstrap-4') }}
@endsection
