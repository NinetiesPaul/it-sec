<?php


namespace App\Services;


use App\Models\Agente;
use App\Models\ArmaHistoricoUso;
use App\Models\Endereco;
use App\Models\Usuario;
use App\Models\VeiculoHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgenteServices
{
    public static function getAll()
    {
        return Usuario::select(['usuario.*','agente.*','usuario.id as usuario_id', 'agente.id as agente_id'])
            ->join('agente', 'agente.usuario_id', 'usuario.id')
            ->orderBy('usuario.nome', 'asc')
            ->get();
    }

    public static function getOne($usuarioId)
    {
        $usuario = Usuario::select('usuario.*')
            ->join('agente', 'agente.usuario_id', 'usuario.id')
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

        Agente::create([
            'usuario_id' => $usuario->id,
            'contratado_em' => Carbon::now()->format('Y-m-d H:i:s')
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

        Endereco::where('id', $request->endereco_id)
            ->update([
                'rua' => $request->input('rua'),
                'numero' => (int) $request->input('numero'),
                'bairro' => $request->input('bairro'),
                'cep' => $request->input('cep'),
                'cidade' => $request->input('cidade'),
                'complemento' => $request->input('complemento'),
                'estado_id' => $request->input('estado_id')
            ]);
    }

    public static function usage($agenteId)
    {
        $armas = ArmaHistoricoUso::where('agente_id', $agenteId)->get();
        $veiculos = VeiculoHistoricoUso::where('agente_id', $agenteId)->get();

        return [ $armas, $veiculos ];
    }
}
