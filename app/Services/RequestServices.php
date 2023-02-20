<?php

namespace App\Services;

use App\Models\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RequestServices
{
    public static function getAll($availableOnly = false, $forClient = false)
    {
        if ($availableOnly) {
            return Requests::whereNull('ended_on')->get();
        }
        if($forClient) {
            return Requests::where('client_id', $forClient)->get();
        }
        return Requests::all();
    }

    public static function getOne($atendimentoId)
    {
        return Requests::where('id', $atendimentoId)
            ->first();
    }

    public static function counter()
    {
        return Requests::whereNull('finalizado_em')->count();
    }

    public static function store($clientId, Request $request)
    {
        $call = Requests::create([
            'client_id' => $clientId,
            'created_on' => Carbon::now()->format('Y-m-d H:i:s'),
            'description' => $request->input('description'),
        ]);

        return $call->id;
    }

    public static function assignCall(Request $request)
    {
        Requests::where('id', $request->input('callId'))
        ->update([
            'awnsered_on' => Carbon::now()->format('Y-m-d H:i:s'),
            'awnsered_by' => $request->input('agentId')
        ]);
    }
}
