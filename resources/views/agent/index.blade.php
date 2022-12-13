<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <meta name="agent_id" content="{{ $agent->isAgent->id }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/login.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
            function atendimento() {
                $.ajax({
                    type: "GET",
                    url: "/ajax/calls/" + $('meta[name="agent_id"]').attr('content'),
                    success: function(data){
                        data = jQuery.parseJSON(data)
                        
                        $(".table tbody").html("")
                        
                        $.each(data, function(k, v) {
                            $(".table tbody").html($(".table tbody").html() + "<tr><td>Cliente</td><td>" + v.description + "</td></tr>")
                        });

                        setTimeout(function(){
                            atendimento();
                        }, 2500);
                    }
                });
            }

            $(document).ready(function(){
                $("#cadastrar_agente_list").css('height', $("#cadastrar_agente_form").css('height'));
                atendimento();
            });
        </script>
        <title>itSec :: Home Page</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">itSec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="PokeXchange">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container text-center">
            <div class="jumbotron text-center">
                <p><strong>Ocorrências na sua Área</strong></p>
                
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Cliente</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
