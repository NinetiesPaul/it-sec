<?php


namespace App\Services;


use App\Models\Area;
use App\Models\AreaAgente;
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
            'descricao' => $request->input('descricao')
        ]);
    }

    public static function update($areaId, Request $request)
    {
        Area::where('id', $areaId)
            ->update([
                'descricao' => $request->input('descricao')
            ]);
    }

    public static function usageHistory($areaId)
    {
        return AreaAgente::select(['area_agente.*','usuario.nome','usuario.id as usuario_id'])
            ->join('agente', 'agente.id', 'area_agente.agente_id')
            ->join('usuario', 'usuario.id', 'agente.usuario_id')
            ->where('area_id', $areaId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($areaId, Request $request)
    {
        $areaHistorico = AreaAgente::where('area_id', $areaId)
            ->whereNull('fim')
            ->first();

        if ($areaHistorico) {
            if ($areaHistorico->agente_id === (int) $request->input('agente_id')) {
                return null;
            }

            $areaHistorico->fim = Carbon::now()->format('Y-m-d H:i:s');
            $areaHistorico->save();
        }

        AreaAgente::create([
            'area_id' => $areaId,
            'agente_id' => $request->input('agente_id'),
            'inicio' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
