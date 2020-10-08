<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="UTF8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ \Illuminate\Support\Facades\URL::asset('css/navbar.css') }}" rel="stylesheet">
        <script src="{{ \Illuminate\Support\Facades\URL::asset('js/jquery.js') }}"></script>
        <script>
            function verificarLogin(val) {
                $.ajax({
                    type: "POST",
                    url: "/verificarLogin",
                    data: { login : val, tipo : "aluno" },
                    success: function(data){
                        data = jQuery.parseJSON(data)
                        if (data.loginTaken === true){
                            $("#btn").attr("disabled", true)
                            $("#disponibilidade").slideDown("slow", function(){});
                        } else {
                            $("#btn").attr("disabled", false)
                            $("#disponibilidade").slideUp("slow", function(){});
                        }
                    }
                });
            }

            $(document).on('focusout', '#email', function(){
                verificarLogin(this.value);
            });

            $(document).ready(function(){
                $("#disponibilidade").hide();
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
                <br/><p><strong>Alteração de Agente</strong></p>
                <form action="/admin/cliente/{{$usuario->id}}" method="post" role="form" class="form-horizontal " >
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="endereco_id" value="{{$usuario->endereco_id}}">
                    <input type="hidden" name="salt" value="{{$usuario->salt}}">

                    <div class="form-group row justify-content-center ">
                        <label for="nome" class="col-form-label col-md-2 col-form-label-sm ">Nome:</label>
                        <div class="col-md-3">
                            <input type="text" name="nome" id="nome" class="form-control form-control-sm" value="{{$usuario->nome}}" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="email" class="col-form-label col-md-2 col-form-label-sm ">E-mail:</label>
                        <div class="col-md-3">
                            <input type="text" name="email" id="email" class="form-control form-control-sm" aria-describedby="disponibilidade" value="{{$usuario->mail}}"  required>
                            <small id="disponibilidade">Login em uso!</small>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="password" class="col-form-label col-md-2 col-form-label-sm ">Senha:</label>
                        <div class="col-md-3">
                            <input type="password" name="password" id="password" class="form-control form-control-sm" >
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group row justify-content-center ">
                        <label for="tel1" class="col-form-label col-md-2 col-form-label-sm ">Telefone Residencial:</label>
                        <div class="col-md-3">
                            <input type="text" name="tel1" id="tel1" class="form-control form-control-sm" value="{{$usuario->tel1}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="tel2" class="col-form-label col-md-2 col-form-label-sm ">Telefone Móvel:</label>
                        <div class="col-md-3">
                            <input type="text" name="tel2" id="tel2" class="form-control form-control-sm" value="{{$usuario->tel2}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="avatar" class="col-form-label col-md-2 col-form-label-sm ">Avatar:</label>
                        <div class="col-md-3">
                            <input type="file" name="avatar" id="avatar" class="form-control form-control-sm" >
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group row justify-content-center ">
                        <label for="rua" class="col-form-label col-md-2 col-form-label-sm ">Rua:</label>
                        <div class="col-md-3">
                            <input type="text" name="rua" id="rua" class="form-control form-control-sm" value="{{$usuario->endereco->rua}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="numero" class="col-form-label col-md-2 col-form-label-sm ">Número:</label>
                        <div class="col-md-3">
                            <input type="text" name="numero" id="numero" class="form-control form-control-sm" value="{{$usuario->endereco->numero}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="bairro" class="col-form-label col-md-2 col-form-label-sm ">Bairro:</label>
                        <div class="col-md-3">
                            <input type="text" name="bairro" id="bairro" class="form-control form-control-sm" value="{{$usuario->endereco->bairro}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="cep" class="col-form-label col-md-2 col-form-label-sm ">CEP:</label>
                        <div class="col-md-3">
                            <input type="text" name="cep" id="cep" class="form-control form-control-sm" value="{{$usuario->endereco->cep}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="cidade" class="col-form-label col-md-2 col-form-label-sm ">Cidade:</label>
                        <div class="col-md-3">
                            <input type="text" name="cidade" id="cidade" class="form-control form-control-sm" value="{{$usuario->endereco->cidade}}" >
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="complemento" class="col-form-label col-md-2 col-form-label-sm ">Complemento:</label>
                        <div class="col-md-3">
                            <input type="text" name="complemento" id="complemento" class="form-control form-control-sm" value="{{$usuario->endereco->complemento}}">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center ">
                        <label for="estado_id" class="col-form-label col-md-2 col-form-label-sm ">Estado:</label>
                        <div class="col-md-3">

                            <select name="estado_id" id="estado_id" class="form-control form-control-sm selectpicker" title="Selecione um estado" required>
                                @foreach($estados as $estado)
                                    <option value="{{$estado->id}}" {{($estado->id === $usuario->endereco->estado_id) ? 'selected' : '' }}>{{$estado->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btn" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-plus'></span> Atualizar</button>
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
