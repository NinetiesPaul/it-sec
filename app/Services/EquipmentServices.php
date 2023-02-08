<?php

namespace App\Services;

use App\Models\Equipment;
use App\Models\EquipmentUsageHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EquipmentServices
{
    public static function getAll()
    {
        return Equipment::all();
    }

    public static function getOne($armaId)
    {
        $arma = Equipment::where('id', $armaId)
            ->first();

        return $arma;
    }

    public static function store(Request $request)
    {
        Equipment::create([
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
        Equipment::where('id', $armaId)
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
        return EquipmentUsageHistory::where('equipment_id', $armaId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($armaId, Request $request)
    {
        $armaHistorico = EquipmentUsageHistory::where('equipment_id', $armaId)
            ->whereNull('ended_on')
            ->first();

        if ($armaHistorico) {
            if ($armaHistorico->agent_id === (int) $request->input('agente_id')) {
                return null;
            }

            $armaHistorico->ended_on = Carbon::now()->format('Y-m-d H:i:s');
            $armaHistorico->save();
        }

        EquipmentUsageHistory::create([
            'equipment_id' => $armaId,
            'agent_id' => $request->input('agente_id'),
            'started_on' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Equipment::where('id', $armaId)
            ->update([
                'is_available' => 0,
            ]);
    }
}
