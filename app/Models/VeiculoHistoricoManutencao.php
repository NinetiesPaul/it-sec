<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VeiculoHistoricoManutencao extends Model
{
    protected $table = 'veiculo_historico_manutencao';

    protected $fillable = [
        'id',
        'veiculo_id',
        'inicio_de_manutencao',
        'fim_de_manutencao',
        'local',
        'valor',
        'descricao',
    ];

    public $timestamps = false;
}
