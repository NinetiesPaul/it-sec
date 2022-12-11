<?php

namespace App\Services;

use App\Models\Atendimentos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AtendimentoServices
{
    public static function getAll()
    {
        return Atendimentos::all();
    }

    public static function getOne($atendimentoId, $clienteId = false)
    {
        if ($clienteId) {
            return Atendimentos::where('id', $atendimentoId)
                ->where('cliente_id', $clienteId)
                ->first();
        }

        return Atendimentos::where('id', $atendimentoId)
            ->first();
    }

    public static function counter()
    {
        return Atendimentos::whereNull('finalizado_em')->count();
    }

    public static function store($clienteId, Request $request)
    {
        $atendimento = Atendimentos::create([
            'cliente_id' => $clienteId,
            'data' => Carbon::now()->format('Y-m-d H:i:s'),
            'descricao' => $request->input('descricao'),
        ]);

        return $atendimento->id;
    }
}
