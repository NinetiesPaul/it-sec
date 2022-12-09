<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
            function verificarLogin(val) {
                $.ajax({
                    type: "POST",
                    url: "/verificarLogin",
                    data: { login : val, tipo : "aluno" },
                    success: function(data){
                        data = jQuery.parseJSON(data)
                        if (data.loginTaken === true){
                            $("#btn").attr("disabled", true)
                            $("#disponibilidade").slideDown("slow", function(){});
                        } else {
                            $("#btn").attr("disabled", false)
                            $("#disponibilidade").slideUp("slow", function(){});
                        }
                    }
                });
            }

            $(document).on('focusout', '#email', function(){
                verificarLogin(this.value);
            });

            $(document).ready(function(){
                $("#cadastrar_agente_list").css('height', $("#cadastrar_agente_form").css('height'));
                $("#disponibilidade").hide();
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
                            <a class="dropdown-item" href="{{ route('admin.equipment') }}">Armas</a>
                            <a class="dropdown-item" href="{{ route('admin.area') }}">Áreas</a>
                            <a class="dropdown-item" href="{{ route('admin.agent') }}">Agentes</a>
                            <a class="dropdown-item" href="{{ route('admin.client') }}">Clientes</a>
                            <a class="dropdown-item" href="{{ route('admin.vehicle') }}">Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="cadastrar_agente_form-tab" data-toggle="tab" href="#cadastrar_agente_form" role="tab" aria-controls="home"
                           aria-selected="true">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cadastrar_agente_list-tab" data-toggle="tab" href="#cadastrar_agente_list" role="tab" aria-controls="profile"
                           aria-selected="false">Lista de Agentes</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="cadastrar_agente_form" role="tabpanel" >
                        <p><strong>Cadastro de Agente</strong></p>
                        <form action="/admin/agent" method="post" role="form" class="form-horizontal " >
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <label for="name" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
                                <div class="col-md-3">
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="email" class="col-form-label col-md-2 col-form-label-sm ">E-mail:</label>
                                <div class="col-md-3">
                                    <input type="text" name="email" id="email" class="form-control form-control-sm" aria-describedby="disponibilidade" required>
                                    <small id="disponibilidade">Login em uso!</small>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="password" class="col-form-label col-md-2 col-form-label-sm ">Senha:</label>
                                <div class="col-md-3">
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                                </div>
                            </div>

                            <hr/>

                            <div class="form-group row justify-content-center ">
                                <label for="phone1" class="col-form-label col-md-2 col-form-label-sm ">Telefone Residencial:</label>
                                <div class="col-md-3">
                                    <input type="text" name="phone1" id="phone1" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="phone2" class="col-form-label col-md-2 col-form-label-sm ">Telefone Móvel:</label>
                                <div class="col-md-3">
                                    <input type="text" name="phone2" id="phone2" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="profile_picture" class="col-form-label col-md-2 col-form-label-sm ">Avatar:</label>
                                <div class="col-md-3">
                                    <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm" >
                                </div>
                            </div>

                            <hr/>

                            <div class="form-group row justify-content-center ">
                                <label for="street" class="col-form-label col-md-2 col-form-label-sm ">Rua:</label>
                                <div class="col-md-3">
                                    <input type="text" name="street" id="street" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="number" class="col-form-label col-md-2 col-form-label-sm ">Número:</label>
                                <div class="col-md-3">
                                    <input type="text" name="number" id="number" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="detail1" class="col-form-label col-md-2 col-form-label-sm ">Bairro:</label>
                                <div class="col-md-3">
                                    <input type="text" name="detail1" id="detail1" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="zip" class="col-form-label col-md-2 col-form-label-sm ">CEP:</label>
                                <div class="col-md-3">
                                    <input type="text" name="zip" id="zip" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="city" class="col-form-label col-md-2 col-form-label-sm ">Cidade:</label>
                                <div class="col-md-3">
                                    <input type="text" name="city" id="city" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="detail2" class="col-form-label col-md-2 col-form-label-sm ">Complemento:</label>
                                <div class="col-md-3">
                                    <input type="text" name="detail2" id="detail2" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="state_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
                                <div class="col-md-3">

                                    <select name="state_id" id="state_id" class="form-control form-control-sm selectpicker" title="Selecione um estado" required>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" >{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
                    </form>
                    </div>

                    <div class="tab-pane fade show" id="cadastrar_agente_list" role="tabpanel" >
                        <p><strong>Lista de Agentes</strong></p>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Contratado Em</th>
                                <th scope="col">Demitido Em</th>
                                <th scope="col"> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->user_id}}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->admitted_on)->format('d/m/Y') }}</td>
                                    <td>{{( isset($user->terminated_at)) ? \Carbon\Carbon::parse($user->terminated_at)->format('d/m/Y') : '' }}</td>
                                    <td>
                                        <a href="agent/{{$user->user_id}}">editar</a> | <a href="agent/{{$user->agent_id}}/usage">uso</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script type="application/json" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
