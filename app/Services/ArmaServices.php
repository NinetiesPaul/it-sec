<?php

namespace App\Services;

use App\Models\Arma;
use App\Models\ArmaHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArmaServices
{
    public static function getAll()
    {
        return Arma::all();
    }

    public static function getOne($armaId)
    {
        $arma = Arma::where('id', $armaId)
            ->first();

        return $arma;
    }

    public static function store(Request $request)
    {
        Arma::create([
            'type' => $request->input('type'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'sn' => $request->input('sn'),
            'notes' => $request->input('notes'),
            'is_available' => 1,
        ]);
    }

    public static function update($armaId, Request $request)
    {
        Arma::where('id', $armaId)
            ->update([
                'type' => $request->input('type'),
                'make' => $request->input('make'),
                'model' => $request->input('model'),
                'sn' => $request->input('sn'),
                'notes' => $request->input('notes'),
            ]);
    }

    public static function usageHistory($armaId)
    {
        return ArmaHistoricoUso::where('equipment_id', $armaId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($armaId, Request $request)
    {
        $armaHistorico = ArmaHistoricoUso::where('equipment_id', $armaId)
            ->whereNull('ended_on')
            ->first();

        if ($armaHistorico) {
            if ($armaHistorico->agent_id === (int) $request->input('agente_id')) {
                return null;
            }

            $armaHistorico->ended_on = Carbon::now()->format('Y-m-d H:i:s');
            $armaHistorico->save();
        }

        ArmaHistoricoUso::create([
            'equipment_id' => $armaId,
            'agent_id' => $request->input('agente_id'),
            'started_on' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Arma::where('id', $armaId)
            ->update([
                'is_available' => 0,
            ]);
    }
}
