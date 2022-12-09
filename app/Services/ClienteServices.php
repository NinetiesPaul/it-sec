<?php


namespace App\Services;


use App\Models\Agente;
use App\Models\ArmaHistoricoUso;
use App\Models\Client;
use App\Models\Endereco;
use App\Models\User;
use App\Models\VeiculoHistoricoUso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClienteServices
{
    public static function getAll()
    {
        return User::select(['users.*','client.*','users.id as user_id', 'client.id as client_id'])
            ->join('client', 'client.user_id', 'users.id')
            ->orderBy('users.name', 'asc')
            ->get();
    }

    public static function getOne($userId)
    {
        return Client::select(['users.*','client.*','address.*', 'users.id as user_id', 'client.id as client_id', 'address.id as address_id'])
        ->join('users', 'client.user_id', 'users.id')
        ->join('address', 'users.address_id', 'address.id')
        ->where('users.id', $userId)
        ->first();
    }

    public static function store(Request $request)
    {
        $endereco = Endereco::create([
            'street' => $request->input('street'),
            'number' => (int) $request->input('number'),
            'detail1' => $request->input('detail1'),
            'zip' => $request->input('zip'),
            'city' => $request->input('city'),
            'detail2' => $request->input('detail2'),
            'state_id' => $request->input('state_id')
        ]);

        $usuario = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'profile_picture' => $request->input('profile_picture'),
            'address_id' => $endereco->id,
        ]);

        Client::create([
            'user_id' => $usuario->id
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
}
