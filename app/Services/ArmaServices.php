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
            'tipo' => $request->input('tipo'),
            'fabricante' => $request->input('fabricante'),
            'modelo' => $request->input('modelo'),
            'n_serie' => $request->input('n_serie'),
            'observacoes' => $request->input('observacoes'),
            'disponibilidade' => 1,
        ]);
    }

    public static function update($armaId, Request $request)
    {
        Arma::where('id', $armaId)
            ->update([
                'tipo' => $request->input('tipo'),
                'fabricante' => $request->input('fabricante'),
                'modelo' => $request->input('modelo'),
                'n_serie' => $request->input('n_serie'),
                'observacoes' => $request->input('observacoes'),
            ]);
    }

    public static function usageHistory($armaId)
    {
        return ArmaHistoricoUso::select(['arma_historico_uso.*','usuario.nome','usuario.id as usuario_id'])
            ->join('agente', 'agente.id', 'arma_historico_uso.agente_id')
            ->join('usuario', 'usuario.id', 'agente.usuario_id')
            ->where('arma_id', $armaId)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public static function setUsage($armaId, Request $request)
    {
        $armaHistorico = ArmaHistoricoUso::where('arma_id', $armaId)
            ->whereNull('fim_de_uso')
            ->first();

        if ($armaHistorico) {
            if ($armaHistorico->agente_id === (int) $request->input('agente_id')) {
                return null;
            }

            $armaHistorico->fim_de_uso = Carbon::now()->format('Y-m-d H:i:s');
            $armaHistorico->save();
        }

        ArmaHistoricoUso::create([
            'arma_id' => $armaId,
            'agente_id' => $request->input('agente_id'),
            'inicio_de_uso' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Arma::where('id', $armaId)
            ->update([
                'disponibilidade' => 0,
            ]);
    }
}
