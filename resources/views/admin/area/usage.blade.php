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

@section('tab_one', 'Atribuir')
@section('form')
    <p><strong>Atribuir agente a Área {{ $area->name }}</strong></p>
    <form action="/admin/area/{{$area->id}}/assign" method="post" role="form" class="form-horizontal " >
        @csrf
        <div class="form-group row justify-content-center ">
            <label for="agent_id" class="col-form-label col-md-2 col-form-label-sm ">Agente:</label>
            <div class="col-md-3">
                <select name="agent_id" id="agent_id" class="form-control form-control-sm selectpicker" title="Selecione um agente" required>
                    @foreach($agentes as $agente)
                        <option value="{{$agente->id}}" >{{ $agente->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
    </form>
@endsection

@section('tab_two', 'Historico de Designação')
@section('listing')
    <p><strong>Historico de designação de agentes</strong></p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Agente</th>
            <th scope="col">Inicio de patrulhamento</th>
            <th scope="col">Fim de patrulhamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historicos as $historico)
            <tr>
                <td>{{$historico->agent->user->name}}</td>
                <td>{{ \Carbon\Carbon::parse($historico->started_on)->format('d/m/Y') }}</td>
                <td>{{( isset($historico->ended_on)) ? \Carbon\Carbon::parse($historico->ended_on)->format('d/m/Y') : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $historicos->links('pagination::bootstrap-4') }}
@endsection
