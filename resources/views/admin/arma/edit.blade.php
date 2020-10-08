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
                            <a class="dropdown-item" href="{{ route('admin.arma') }}">Armas</a>
                            <a class="dropdown-item" href="{{ route('admin.area') }}">Área</a>
                            <a class="dropdown-item" href="{{ route('admin.agente') }}">Agente</a>
                            <a class="dropdown-item" href="{{ route('admin.cliente') }}">Cliente</a>
                            <a class="dropdown-item" href="{{ route('admin.veiculo') }}">Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center">
                <p><strong>Alteração de Arma</strong></p>
                <form action="/admin/arma/{{$arma->id}}" method="post" role="form" class="form-horizontal " >
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group row justify-content-center ">
                        <label for="tipo" class="col-form-label col-md-2 col-form-label-sm ">Tipo:</label>
                        <div class="col-md-3">
                            <select name="tipo" id="tipo" class="form-control form-control-sm selectpicker" title="Selecione um tipo" required>
                                <option value="PISTOLA" {{ ($arma->tipo === 'PISTOLA') ? "selected" : '' }}>Pistola</option>
                                <option value="ESCOPETA" {{ ($arma->tipo === 'ESCOPETA') ? "selected" : '' }}>Escopeta</option>
                                <option value="REVOLVER" {{ ($arma->tipo === 'REVOLVER') ? "selected" : '' }}>Revolver</option>
                                <option value="OUTRO_TIPO" {{ ($arma->tipo === 'OUTRO_TIPO') ? "selected" : '' }}>Outro tipo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="fabricante" class="col-form-label col-md-2 col-form-label-sm ">Fabricante:</label>
                        <div class="col-md-3">
                            <input type="text" name="fabricante" id="fabricante" class="form-control form-control-sm" value="{{$arma->fabricante}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="modelo" class="col-form-label col-md-2 col-form-label-sm ">Modelo:</label>
                        <div class="col-md-3">
                            <input type="text" name="modelo" id="modelo" class="form-control form-control-sm" value="{{$arma->modelo}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="n_serie" class="col-form-label col-md-2 col-form-label-sm ">Nº de Série:</label>
                        <div class="col-md-3">
                            <input type="text" name="n_serie" id="n_serie" class="form-control form-control-sm" value="{{$arma->n_serie}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="observacoes" class="col-form-label col-md-2 col-form-label-sm ">Observações:</label>
                        <div class="col-md-3">
                            <input type="text" name="observacoes" id="observacoes" class="form-control form-control-sm" value="{{$arma->observacoes}}" >
                        </div>
                    </div>

                    <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Cadastrar</button>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
