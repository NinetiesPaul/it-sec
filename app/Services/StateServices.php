<?php


namespace App\Services;


use App\Models\State;

class StateServices
{
    public static function getAll()
    {
        return State::all();
    }

}
