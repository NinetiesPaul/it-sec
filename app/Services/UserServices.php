<?php

namespace App\Services;

use App\Models\User;

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
