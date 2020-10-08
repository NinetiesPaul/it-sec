<?php


namespace App\Services;


use App\Models\Agente;
use App\Models\ArmaHistoricoUso;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Usuario;
use App\Models\VeiculoHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteServices
{
    public static function getAll()
    {
        return Usuario::select(['usuario.*','cliente.*','usuario.id as usuario_id', 'cliente.id as cliente_id'])
            ->join('cliente', 'cliente.usuario_id', 'usuario.id')
            ->orderBy('usuario.nome', 'asc')
            ->get();
    }

    public static function getOne($usuarioId)
    {
        $usuario = Usuario::select('usuario.*')
            ->join('cliente', 'cliente.usuario_id', 'usuario.id')
            ->where('usuario.id', $usuarioId)
            ->first();

        $usuario->endereco = Endereco::where('id', $usuario->endereco_id)->first();

        return $usuario;
    }

    public static function store(Request $request)
    {
        $endereco = Endereco::create([
            'rua' => $request->input('rua'),
            'numero' => (int) $request->input('numero'),
            'bairro' => $request->input('bairro'),
            'cep' => $request->input('cep'),
            'cidade' => $request->input('cidade'),
            'complemento' => $request->input('complemento'),
            'estado_id' => $request->input('estado_id')
        ]);

        $salt = time() + rand(100, 1000);
        $usuario = Usuario::create([
            'nome' => $request->input('nome'),
            'mail' => $request->input('email'),
            'pass' => md5($request->input('password') . $salt),
            'tel1' => $request->input('tel1'),
            'tel2' => $request->input('tel2'),
            'salt' => $salt,
            'avatar' => $request->input('avatar'),
            'endereco_id' => $endereco->id,
        ]);

        Cliente::create([
            'usuario_id' => $usuario->id
        ]);
    }

    public static function update($usuarioId, Request $request)
    {

        $fields = [
            'nome' => $request->input('nome'),
            'mail' => $request->input('email'),
            'tel1' => $request->input('tel1'),
            'tel2' => $request->input('tel2'),
            'avatar' => $request->input('avatar')
        ];

        if (!empty($request->input('password'))) {
            $password = $request->input('password');
            $fields['pass'] = md5($password . $request->input('salt'));
        }

        Usuario::where('usuario.id', $usuarioId)
            ->update($fields);

        if (!empty($request->input('endereco_id')) && $request->input('endereco_id') > 0) {
            Endereco::where('id', $request->endereco_id)
                ->update([
                    'rua' => $request->input('rua'),
                    'numero' => (int)$request->input('numero'),
                    'bairro' => $request->input('bairro'),
                    'cep' => $request->input('cep'),
                    'cidade' => $request->input('cidade'),
                    'complemento' => $request->input('complemento'),
                    'estado_id' => $request->input('estado_id')
                ]);
        }
    }
}
