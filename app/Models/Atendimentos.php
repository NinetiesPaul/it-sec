<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    protected $table = 'atendimentos';

    protected $fillable = [
        'cliente_id',
        'data',
        'descricao',
        'respondido_por',
        'respondido_em',
        'finalizado_em',
        'observacao',
    ];

    public $timestamps = false;
}
