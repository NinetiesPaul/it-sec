<?php


namespace App\Services;


use App\Models\Estado;

class EstadoServices
{
    public static function getAll()
    {
        return Estado::all();
    }

}
