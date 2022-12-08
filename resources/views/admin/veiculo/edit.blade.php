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
                            <a class="dropdown-item" href="{{ route('admin.area') }}">Área</a>
                            <a class="dropdown-item" href="{{ route('admin.agent') }}">Agente</a>
                            <a class="dropdown-item" href="{{ route('admin.client') }}">Cliente</a>
                            <a class="dropdown-item" href="{{ route('admin.vehicle') }}">Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center">
                <p><strong>Alteração de Veiculo</strong></p>
                <form action="/admin/vehicle/{{$veiculo->id}}" method="post" role="form" class="form-horizontal " >
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group row justify-content-center ">
                        <label for="type" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
                        <div class="col-md-3">
                            <select name="type" id="type" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                                <option value="MOTORCYCLE" {{ ($veiculo->type === 'MOTORCYCLE') ? 'selected' : '' }}>Moto</option>
                                <option value="4_DOOR" {{ ($veiculo->type === '4_DOOR') ? 'selected' : '' }}>Veiculo 4 portas</option>
                                <option value="2_DOOR" {{ ($veiculo->type === '2_DOOR') ? 'selected' : '' }}>Veiculo 2 portas</option>
                                <option value="OTHER" {{ ($veiculo->type === 'OTHER') ? 'selected' : '' }}>Outro tipo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="make" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
                        <div class="col-md-3">
                            <input type="text" name="make" id="make" class="form-control form-control-sm" value="{{$veiculo->make}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="model" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
                        <div class="col-md-3">
                            <input type="text" name="model" id="model" class="form-control form-control-sm" value="{{$veiculo->model}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="year" class="col-form-label col-md-2 col-form-label-sm ">Ano:</label>
                        <div class="col-md-3">
                            <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{$veiculo->year}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="license" class="col-form-label col-md-2 col-form-label-sm ">Placa:</label>
                        <div class="col-md-3">
                            <input type="text" name="license" id="license" class="form-control form-control-sm" value="{{$veiculo->license}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="register" class="col-form-label col-md-2 col-form-label-sm ">Renavam:</label>
                        <div class="col-md-3">
                            <input type="text" name="register" id="register" class="form-control form-control-sm" value="{{$veiculo->register}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="color" class="col-form-label col-md-2 col-form-label-sm ">Cor:</label>
                        <div class="col-md-3">
                            <input type="text" name="color" id="color" class="form-control form-control-sm" value="{{$veiculo->color}}" required>
                        </div>
                    </div>


                    <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
            </form>

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
