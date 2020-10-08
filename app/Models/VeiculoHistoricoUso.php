<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VeiculoHistoricoUso extends Model
{
    protected $table = 'veiculo_historico_uso';

    protected $fillable = [
        'id',
        'veiculo_id',
        'agente_id',
        'inicio_de_uso',
        'fim_de_uso',
    ];

    public $timestamps = false;
}
