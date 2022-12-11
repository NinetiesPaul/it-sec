<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/index.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
            function atendimentos() {
                $.ajax({
                    type: "GET",
                    url: "/admin/atendimentos/contar",
                    success: function(data){
                        data = jQuery.parseJSON(data)
                        $("#contador").text(data);
                        setTimeout(function(){
                            atendimentos();
                            }, 5000);
                    }
                });
            }

            $(document).ready(function(){
                atendimentos();
            });
        </script>
        <title>itSec :: Home Page</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">itSec</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Atendimentos <span class="badge badge-light" id="contador"></span>
                    </a>
                </li>
            </ul>
        </nav>h

        <div class="container text-center">
            <div class="jumbotron text-center">
                <a href="admin/agent" class="btn btn-light btn btn-block">Gerenciamento de Agentes</a>
                <a href="admin/area" class="btn btn-light btn btn-block">Gerenciamento de Área</a>
                <a href="admin/equipment" class="btn btn-light btn btn-block">Gerenciamento de Equipamentos</a>
                <a href="admin/client" class="btn btn-light btn btn-block">Gerenciamento de Clientes</a>
                <a href="admin/vehicle" class="btn btn-light btn btn-block">Gerenciamento de Veículos</a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
