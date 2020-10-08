<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArmaHistoricoUso extends Model
{
    protected $table = 'arma_historico_uso';

    protected $fillable = [
        'id',
        'arma_id',
        'agente_id',
        'inicio_de_uso',
        'fim_de_uso',
    ];

    public $timestamps = false;
}
