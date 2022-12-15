<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
        </script>
        <title>itSec :: Home Page</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ route('client') }}">itSec</a>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Logado como {{ Illuminate\Support\Facades\Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=" {{ route('client') }} ">Home</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron text-center">
                <p><strong>Histórico de chamados</strong></p>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Descrição</th>
                            <th>Aberto Em</th>
                            <th>Respondido Em</th>
                            <th>Respondido Por</th>
                            <th>Finalizado Em</th>
                            <th>Finalizado Por</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dispatches as $dispatch)
                            <tr>
                                <td>{{ $dispatch->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($dispatch->created_on)->format('d/m/Y h:i:s A') }}</td>
                                <td>{{ ($dispatch->awnsered_on) ? \Carbon\Carbon::parse($dispatch->awnsered_on)->format('d/m/Y h:i:s A') : '' }}</td>
                                <td>{{ ($dispatch->awnsered_by) ? $dispatch->awnseredBy->user->name : '' }}</td>
                                <td>{{ ($dispatch->ended_on) ? \Carbon\Carbon::parse($dispatch->ended_on)->format('d/m/Y h:i:s A') : '' }}</td>
                                <td>{{ ($dispatch->ended_by) ? $dispatch->awnseredBy->user->name : '' }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('call', (int) $dispatch->id ) }}">Detalhes</a></td>
                            </tr>
                        @endforeach
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
