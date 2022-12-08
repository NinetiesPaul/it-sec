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
                $("#cadastrar_arma_list").css('height', $("#cadastrar_arma_form").css('height'));
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
                        <a class="nav-link active" id="cadastrar_arma_form-tab" data-toggle="tab" href="#cadastrar_arma_form" role="tab" aria-controls="home"
                           aria-selected="true">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cadastrar_arma_list-tab" data-toggle="tab" href="#cadastrar_arma_list" role="tab" aria-controls="profile"
                           aria-selected="false">Lista de Armas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="cadastrar_arma_form" role="tabpanel" >
                        <p><strong>Cadastro de Arma</strong></p>
                        <form action="/admin/equipment" method="post" role="form" class="form-horizontal " >
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
                                <div class="col-md-3">
                                    <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                                        <option value="GUN">Arma de Fogo</option>
                                        <option value="OTHER">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
                                <div class="col-md-3">
                                    <input type="text" name="make" id="make" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
                                <div class="col-md-3">
                                    <input type="text" name="model" id="model" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="sn" class="col-form-label col-md-2 col-form-label-sm ">Nº de Série:</label>
                                <div class="col-md-3">
                                    <input type="text" name="sn" id="sn" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="notes" class="col-form-label col-md-2 col-form-label-sm ">Observações:</label>
                                <div class="col-md-3">
                                    <input type="text" name="notes" id="notes" class="form-control form-control-sm" >
                                </div>
                            </div>

                            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="cadastrar_arma_list" role="tabpanel" >
                        <p><strong>Lista de Armas</strong></p>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Nº de Série</th>
                                <th scope="col">Disponibilidade</th>
                                <th scope="col"> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($armas as $arma)
                                <tr>
                                    <th scope="row">{{$arma->id}}</th>
                                    <td>{{$arma->type}}</td>
                                    <td>{{$arma->make}}</td>
                                    <td>{{$arma->model}}</td>
                                    <td>{{$arma->sn}}</td>
                                    <td>{{$arma->is_available}}</td>
                                    <td>
                                        <a href="equipment/{{$arma->id}}">Editar</a> |
                                        <a href="equipment/{{$arma->id}}/usage">Uso</a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
