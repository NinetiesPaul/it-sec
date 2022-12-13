<?php

namespace App\Services;

use App\Models\Atendimentos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AtendimentoServices
{
    public static function getAll($availableOnly = false)
    {
        if ($availableOnly) {
            return Atendimentos::whereNull('ended_on')->get();
        }
        return Atendimentos::all();
    }

    public static function getOne($atendimentoId)
    {
        return Atendimentos::where('id', $atendimentoId)
            ->first();
    }

    public static function counter()
    {
        return Atendimentos::whereNull('finalizado_em')->count();
    }

    public static function store($clientId, Request $request)
    {
        $call = Atendimentos::create([
            'client_id' => $clientId,
            'created_on' => Carbon::now()->format('Y-m-d H:i:s'),
            'description' => $request->input('description'),
        ]);

        return $call->id;
    }
}
