<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script src="../js/mobile.detect.js"></script>
        <script>


            $(document).ready(function(){
                $("#cadastrar_agente_list").css('height', $("#cadastrar_agente_form").css('height'));
                $("#disponibilidade").hide();
            });

            var page = $(location).attr('href');
            if (page.includes("aguardando")) {
                $("#cadastrar_agente_form").removeClass('active');
                $("#cadastrar_agente_list").addClass('active');
                $("#descricao").val('aguardando');
                console.log("aguardando");
            }

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
                            <a class="dropdown-item" href="{{ route('admin.arma') }}">Gerenciamento de Armas</a>
                            <a class="dropdown-item" href="{{ route('admin.agente') }}">Gerenciamento de Agente</a>
                            <a class="dropdown-item" href="{{ route('admin.veiculo') }}">Gerenciamento de Veiculos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center">


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="cadastrar_agente_form" role="tabpanel" >
                        <p><strong>Cadastro de Agente</strong></p>
                        <form action="/cliente/{{$clienteId}}/atendimento" method="post" role="form" class="form-horizontal " id="form-agente">
                            @csrf
                            <div class="form-group row justify-content-center ">
                                <label for="descricao" class="col-form-label col-md-2 col-form-label-sm ">Descrição:</label>
                                <div class="col-md-3">
                                    <input type="text" name="descricao" id="descricao" class="form-control form-control-sm" >
                                </div>
                            </div>

                            <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Solicitar</button>
                    </form>
                    </div>

                    <div class="tab-pane fade show" id="cadastrar_agente_list" role="tabpanel" >
                        <p><strong>Lista de Agentes</strong></p>
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
