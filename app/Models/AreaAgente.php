<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AreaAgente extends Model
{
    protected $table = 'area_agente';

    protected $fillable = [
        'area_id',
        'agente_id',
        'inicio',
        'fim',
    ];

    public $timestamps = false;
}
