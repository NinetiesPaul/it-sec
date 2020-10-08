<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function(){
                $("#cadastrar_veiculo_list").css('height', $("#cadastrar_veiculo_form").css('height'));

                var page = $(location).attr('href');
                if (page.includes("page")){
                    $("#cadastrar_veiculo_form").removeClass('active');
                    $("#cadastrar_veiculo_list").addClass('active');
                    $("#cadastrar_veiculo_form-tab").removeClass('active');
                    $("#cadastrar_veiculo_list-tab").addClass('active');
                }
            });
        </script>
        <title>itSec :: Home Page</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ route('admin') }}">itSec</a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Logado como admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.arma') }}">Armas</a>
                            <a class="dropdown-item" href="{{ route('admin.area') }}">Áreas</a>
                            <a class="dropdown-item" href="{{ route('admin.agente') }}">Agentes</a>
                            <a class="dropdown-item" href="{{ route('admin.cliente') }}">Clientes</a>
                            <a class="dropdown-item" href="{{ route('admin.veiculo') }}">Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../../logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center" style="min-height: 600px;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="cadastrar_veiculo_form-tab" data-toggle="tab" href="#cadastrar_veiculo_form" role="tab" aria-controls="home"
                           aria-selected="true">Atribuir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cadastrar_veiculo_list-tab" data-toggle="tab" href="#cadastrar_veiculo_list" role="tab" aria-controls="profile"
                           aria-selected="false">Histórico de Uso</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="cadastrar_veiculo_form" role="tabpanel" >
                        <p><strong>Atribuição de Veiculo</strong></p>
                        <form action="/admin/veiculo/{{$veiculoId}}/atribuir" method="post" role="form" class="form-horizontal " >
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <label for="agente_id" class="col-form-label col-md-2 col-form-label-sm ">Agente:</label>
                                <div class="col-md-3">
                                    <select name="agente_id" id="agente_id" class="form-control form-control-sm selectpicker" title="Selecione um agente" required>
                                        @foreach($agentes as $agente)
                                            <option value="{{$agente->id}}" >{{ $agente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="cadastrar_veiculo_list" role="tabpanel" >
                        <p><strong>Historico de Uso de Veiculo</strong></p>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Agente</th>
                                <th scope="col">Inicio de Uso</th>
                                <th scope="col">Fim de Uso</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($historicos as $historico)
                                <tr>
                                    <td>{{$historico->nome}}</td>
                                    <td>{{$historico->inicio_de_uso}}</td>
                                    <td>{{$historico->fim_de_uso}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $historicos->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
