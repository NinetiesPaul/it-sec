<?php

namespace App\Services;

use App\Models\Agent;
use App\Models\ArmaHistoricoUso;
use App\Models\Endereco;
use App\Models\User;
use App\Models\VeiculoHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentServices
{
    public static function getAll()
    {
        return Agent::orderBy('id', 'desc')
            ->get();
    }

    public static function getOne($userId = null, $byAgent = false)
    {
        if ($byAgent) {
            return Agent::where('id', $byAgent)
            ->first();
        }
        return User::where('id', $userId)
        ->first();
    }

    public static function store(Request $request)
    {
        $address = Endereco::create([
            'street' => $request->input('street'),
            'number' => (int) $request->input('number'),
            'detail1' => $request->input('detail1'),
            'zip' => $request->input('zip'),
            'city' => $request->input('city'),
            'detail2' => $request->input('detail2'),
            'state_id' => $request->input('state_id')
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'profile_picture' => $request->input('profile_picture'),
            'address_id' => $address->id,
        ]);

        Agent::create([
            'user_id' => $user->id,
            'admitted_in' => Carbon::now()->format('Y-m-d'),
            'area_id' => $request->input('area_id')
        ]);
    }

    public static function update($usuarioId, Request $request)
    {

        $fields = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'profile_picture' => $request->input('profile_picture')
        ];

        if (!empty($request->input('password'))) {
            $fields['password'] = Hash::make($request->input('password'));
        }

        Agent::where('user_id', $usuarioId)
            ->update([ 'area_id' => $request->input('area_id') ]);

        User::where('users.id', $usuarioId)
            ->update($fields);

        Endereco::where('id', $request->address_id)
            ->update([
                'street' => $request->input('street'),
                'number' => (int) $request->input('number'),
                'detail1' => $request->input('detail1'),
                'zip' => $request->input('zip'),
                'city' => $request->input('city'),
                'detail2' => $request->input('detail2'),
                'state_id' => $request->input('state_id')
            ]);
    }

    public static function usage($agenteId)
    {
        $armas = ArmaHistoricoUso::where('agent_id', $agenteId)
            ->orderBy('id')
            ->get();

        $veiculos = VeiculoHistoricoUso::where('agent_id', $agenteId)
            ->orderBy('id')
            ->get();

        return [ $armas, $veiculos];
    }
}
