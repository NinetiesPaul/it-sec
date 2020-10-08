<?php


namespace App\Services;


use App\Models\Arma;
use App\Models\ArmaHistoricoUso;
use App\Models\Veiculo;
use App\Models\VeiculoHistoricoManutencao;
use App\Models\VeiculoHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VeiculoServices
{
    public static function getAll()
    {
        return Veiculo::all();
    }

    public static function getOne($veiculoId)
    {
        $veiculo = Veiculo::where('id', $veiculoId)
            ->first();

        return $veiculo;
    }

    public static function store(Request $request)
    {
        Veiculo::create([
            'tipo' => $request->input('tipo'),
            'fabricante' => $request->input('fabricante'),
            'modelo' => $request->input('modelo'),
            'ano' => $request->input('ano'),
            'renavam' => $request->input('renavam'),
            'cor' => $request->input('cor'),
            'placa' => $request->input('placa'),
            'disponibilidade' => $request->input('disponibilidade'),
        ]);
    }

    public static function update($veiculoId, Request $request)
    {
        Veiculo::where('id', $veiculoId)
            ->update([
                'tipo' => $request->input('tipo'),
                'fabricante' => $request->input('fabricante'),
                'modelo' => $request->input('modelo'),
                'ano' => $request->input('ano'),
                'renavam' => $request->input('renavam'),
                'cor' => $request->input('cor'),
                'placa' => $request->input('placa'),
            ]);
    }

    public static function usageHistory($veiculoId)
    {
        return VeiculoHistoricoUso::select(['veiculo_historico_uso.*','usuario.nome','usuario.id as usuario_id'])
            ->join('agente', 'agente.id', 'veiculo_historico_uso.agente_id')
            ->join('usuario', 'usuario.id', 'agente.usuario_id')
            ->where('veiculo_id', $veiculoId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($veiculoId, Request $request)
    {
        $veiculoHistorico = VeiculoHistoricoUso::where('veiculo_id', $veiculoId)
            ->whereNull('fim_de_uso')
            ->first();

        if ($veiculoHistorico) {
            if ($veiculoHistorico->agente_id === (int) $request->input('agente_id')) {
                return null;
            }

            $veiculoHistorico->fim_de_uso = Carbon::now()->format('Y-m-d H:i:s');
            $veiculoHistorico->save();
        }

        VeiculoHistoricoUso::create([
            'veiculo_id' => $veiculoId,
            'agente_id' => $request->input('agente_id'),
            'inicio_de_uso' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Veiculo::where('id', $veiculoId)
            ->update([
                'disponibilidade' => 0,
            ]);
    }

    public static function getMaintenanceHistory($veiculoId)
    {
        return VeiculoHistoricoManutencao::where('veiculo_id', $veiculoId)->get();
    }

    public static function setMaintenanceHistory($veiculoId, Request $request)
    {
        $valor = str_replace(".", "", $request->input('valor'));
        $valor = str_replace(",", ".", $valor);

        VeiculoHistoricoManutencao::create([
            'veiculo_id' => $veiculoId,
            'inicio_de_manutencao' => Carbon::parse($request->input('data_inicio'))->format('Y-m-d H:i:s'),
            'fim_de_manutencao' => Carbon::parse($request->input('data_fim'))->format('Y-m-d H:i:s'),
            'local' => $request->input('local'),
            'valor' => floatval($valor),
            'descricao' => $request->input('descricao')
        ]);
    }
}
