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
            'type' => $request->input('type'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'register' => $request->input('register'),
            'color' => $request->input('color'),
            'license' => $request->input('license'),
            'is_available' => 1,
        ]);
    }

    public static function update($veiculoId, Request $request)
    {
        Veiculo::where('id', $veiculoId)
            ->update([
                'type' => $request->input('type'),
                'make' => $request->input('make'),
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'register' => $request->input('register'),
                'color' => $request->input('color'),
                'license' => $request->input('license'),
            ]);
    }

    public static function usageHistory($veiculoId)
    {
        return VeiculoHistoricoUso::select(['vehicle_usage_history.*','users.name','users.id as user_id'])
            ->join('agent', 'agent.id', 'vehicle_usage_history.agent_id')
            ->join('users', 'users.id', 'agent.user_id')
            ->where('vehicle_id', $veiculoId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($veiculoId, Request $request)
    {
        $veiculoHistorico = VeiculoHistoricoUso::where('vehicle_id', $veiculoId)
            ->whereNull('ended_on')
            ->first();

        if ($veiculoHistorico) {
            if ($veiculoHistorico->agent_id === (int) $request->input('agent_id')) {
                return null;
            }

            $veiculoHistorico->ended_on = Carbon::now()->format('Y-m-d H:i:s');
            $veiculoHistorico->save();
        }

        VeiculoHistoricoUso::create([
            'vehicle_id' => $veiculoId,
            'agent_id' => $request->input('agent_id'),
            'started_on' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Veiculo::where('id', $veiculoId)
            ->update([
                'is_available' => 0,
            ]);
    }

    public static function getMaintenanceHistory($veiculoId)
    {
        return VeiculoHistoricoManutencao::where('vehicle_id', $veiculoId)->paginate(5);
    }

    public static function setMaintenanceHistory($veiculoId, Request $request)
    {
        $cost = str_replace(".", "", $request->input('cost'));
        $cost = str_replace(",", ".", $cost);

        VeiculoHistoricoManutencao::create([
            'vehicle_id' => $veiculoId,
            'started_on' => Carbon::parse($request->input('started_on'))->format('Y-m-d'),
            'ended_on' => Carbon::parse($request->input('ended_on'))->format('Y-m-d'),
            'location' => $request->input('location'),
            'cost' => floatval($cost),
            'description' => $request->input('description')
        ]);
    }
}
