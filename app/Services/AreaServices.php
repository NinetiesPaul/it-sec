<?php


namespace App\Services;


use App\Models\Area;
use App\Models\AreaByAgent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AreaServices
{
    public static function getAll()
    {
        return Area::all();
    }

    public static function getOne($areaId)
    {
        return Area::where('id', $areaId)
            ->first();
    }

    public static function store(Request $request)
    {
        Area::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
    }

    public static function update($areaId, Request $request)
    {
        Area::where('id', $areaId)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
    }

    public static function usageHistory($areaId)
    {
        return AreaByAgent::where('area_id', $areaId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($areaId, Request $request)
    {
        $areaHistorico = AreaByAgent::where('area_id', $areaId)
            ->whereNull('ended_on')
            ->first();

        if ($areaHistorico) {
            if ($areaHistorico->agent_id === (int) $request->input('agent_id')) {
                return null;
            }

            $areaHistorico->fim = Carbon::now()->format('Y-m-d H:i:s');
            $areaHistorico->save();
        }

        AreaByAgent::create([
            'area_id' => $areaId,
            'agent_id' => $request->input('agent_id'),
            'started_on' => Carbon::now()->format('Y-m-d')
        ]);
    }
}
