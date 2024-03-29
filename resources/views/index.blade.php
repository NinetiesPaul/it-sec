<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/login.css') }}" rel="stylesheet">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/index.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
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
            <h3>Welcome</h3>

            <div class="login">
                <form action="{{ route('login') }}" method="post" class="form-signin">
                    @csrf
                    <input type="text" name="email" placeholder="Digite seu login" class="form-control" >
                    <input type="password" name="password" placeholder="Digite sua senha" class="form-control" >
                    <select name="tipo" class="form-control" required>
                        <option value=''>Selecione tipo de login</option>
                        <option value='admin'>Admin</option>
                        <option value='agent'>Agente</option>
                        <option value='client'>Cliente</option>
                    </select><br/>
                    <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block" ><br/>
                </form>
            </div>

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
