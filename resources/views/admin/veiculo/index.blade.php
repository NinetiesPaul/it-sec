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
                        <a class="nav-link active" id="cadastrar_veiculo_form-tab" data-toggle="tab" href="#cadastrar_veiculo_form" role="tab" aria-controls="home"
                           aria-selected="true">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cadastrar_veiculo_list-tab" data-toggle="tab" href="#cadastrar_veiculo_list" role="tab" aria-controls="profile"
                           aria-selected="false">Lista de Veiculos</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="cadastrar_veiculo_form" role="tabpanel" >
                        <p><strong>Cadastro de Veiculo</strong></p>
                        <form action="/admin/vehicle" method="post" role="form" class="form-horizontal " >
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
                                <div class="col-md-3">
                                    <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                                        <option value="MOTORCYCLE">Moto</option>
                                        <option value="4_DOOR">Veiculo 4 portas</option>
                                        <option value="2_DOOR">Veiculo 2 portas</option>
                                        <option value="OTHER">Outro tipo</option>
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
                                <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Ano:</label>
                                <div class="col-md-3">
                                    <input type="text" name="year" id="year" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Placa:</label>
                                <div class="col-md-3">
                                    <input type="text" name="license" id="license" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Renavam:</label>
                                <div class="col-md-3">
                                    <input type="text" name="register" id="register" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center ">
                                <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Cor:</label>
                                <div class="col-md-3">
                                    <input type="text" name="color" id="color" class="form-control form-control-sm" required>
                                </div>
                            </div>


                            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
                    </form>
                    </div>

                    <div class="tab-pane fade show" id="cadastrar_veiculo_list" role="tabpanel" >
                        <p><strong>Lista de Veiculos</strong></p>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Renavam</th>
                                <th scope="col">Cor</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Disponível</th>
                                <th scope="col"> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($veiculos as $veiculo)
                                <tr>
                                    <th scope="row">{{$veiculo->id}}</th>
                                    <td>{{$veiculo->type}}</td>
                                    <td>{{$veiculo->make}}</td>
                                    <td>{{$veiculo->model}}</td>
                                    <td>{{$veiculo->year}}</td>
                                    <td>{{$veiculo->register}}</td>
                                    <td>{{$veiculo->color}}</td>
                                    <td>{{$veiculo->license}}</td>
                                    <td>{{$veiculo->is_available}}</td>
                                    <td>
                                        <a href="vehicle/{{$veiculo->id}}">Editar</a> |
                                        <a href="vehicle/{{$veiculo->id}}/usage">Uso</a> |
                                        <a href="vehicle/{{$veiculo->id}}/maintenance">Manutenção</a>
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
