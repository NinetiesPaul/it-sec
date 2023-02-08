<?php

namespace App\Services;

use App\Models\Vehicle;
use App\Models\VehicleMaintenanceHistory;
use App\Models\VehicleUsageHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleServices
{
    public static function getAll()
    {
        return Vehicle::all();
    }

    public static function getOne($veiculoId)
    {
        $veiculo = Vehicle::where('id', $veiculoId)
            ->first();

        return $veiculo;
    }

    public static function store(Request $request)
    {
        Vehicle::create([
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
        Vehicle::where('id', $veiculoId)
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
        return VehicleUsageHistory::where('vehicle_id', $veiculoId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($veiculoId, Request $request)
    {
        $veiculoHistorico = VehicleUsageHistory::where('vehicle_id', $veiculoId)
            ->whereNull('ended_on')
            ->first();

        if ($veiculoHistorico) {
            if ($veiculoHistorico->agent_id === (int) $request->input('agent_id')) {
                return null;
            }

            $veiculoHistorico->ended_on = Carbon::now()->format('Y-m-d H:i:s');
            $veiculoHistorico->save();
        }

        VehicleUsageHistory::create([
            'vehicle_id' => $veiculoId,
            'agent_id' => $request->input('agent_id'),
            'started_on' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Vehicle::where('id', $veiculoId)
            ->update([
                'is_available' => 0,
            ]);
    }

    public static function getMaintenanceHistory($veiculoId)
    {
        return VehicleMaintenanceHistory::where('vehicle_id', $veiculoId)->paginate(5);
    }

    public static function setMaintenanceHistory($veiculoId, Request $request)
    {
        $cost = str_replace(".", "", $request->input('cost'));
        $cost = str_replace(",", ".", $cost);

        VehicleMaintenanceHistory::create([
            'vehicle_id' => $veiculoId,
            'started_on' => Carbon::parse($request->input('started_on'))->format('Y-m-d'),
            'ended_on' => Carbon::parse($request->input('ended_on'))->format('Y-m-d'),
            'location' => $request->input('location'),
            'cost' => floatval($cost),
            'description' => $request->input('description')
        ]);
    }
}
