<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/css.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../../../js/jquery.mask.js"></script>
        <script>
            function mailCheck(email) {
                var page = $(location).attr('href');
                var typeCheck = (page.includes("agent")) ? "agent" : "client";
                var isEditing = ($("input[name='_method']").val() == "PUT") ? true : false;

                var request = {
                    email: email,
                    type: typeCheck,
                };

                if (isEditing) {
                    request.userId = $("input[name='user_id']").val();
                }

                $.ajax({
                    type: "POST",
                    url: "/email_check",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: request,
                    success: function(data){
                        emailTaken = jQuery.parseJSON(data)
                        
                        if (emailTaken)
                        {
                            $("#btn").removeClass("btn-primary").addClass("btn-danger").html("E-mail em uso!");
                        } else {
                            $("#btn").addClass("btn-primary").removeClass("btn-danger").html("Cadastrar").prop("disabled", false);
                        }
                    }
                });
            }

            $(document).on('focusout', '#email', function(){
                $("#btn").prop("disabled", true)
                mailCheck(this.value);
            });

            @yield('datepicker')
            
            $(document).ready(function(){
                @yield('script')
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
                                <a class="dropdown-item" href="{{ route('admin.equipment') }}">Equipamentos</a>
                                <a class="dropdown-item" href="{{ route('admin.vehicle') }}">Veiculos</a>
                                <a class="dropdown-item" href="{{ route('admin.agent') }}">Agentes</a>
                                <a class="dropdown-item" href="{{ route('admin.client') }}">Clientes</a>
                                <a class="dropdown-item" href="{{ route('admin.area') }}">Áreas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            @yield('form_and_listing')
        </div>

        <!--
            removed due to conflict with datepicker lib
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script type="application/json" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
