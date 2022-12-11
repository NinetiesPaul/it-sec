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


class UserServices
{
    public static function getClientByEmail($email, $userId = null)
    {
        $where = [ 'users.email' => $email ];
        if ($userId) {
            $where[] = [ 'users.id', '!=', $userId ];
        }

        return User::select([ 'users.*' , 'client.*' ])
            ->join('client', 'client.user_id', 'users.id')
            ->where($where)
            ->first();
    }

    public static function getAgentByEmail($email, $userId = null)
    {
        $where = [ 'users.email' => $email ];
        if ($userId) {
            $where[] = [ 'users.id', '!=', $userId ];
        }

        return User::select([ 'users.*', 'agent.*' ])
            ->join('agent', 'agent.user_id', 'users.id')
            ->where($where)
            ->first();
    }
}
