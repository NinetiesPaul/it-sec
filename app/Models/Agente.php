<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $table = 'agente';

    protected $fillable = [
        'usuario_id',
        'contratado_em',
        'demitido_em',
    ];

    public $timestamps = false;
}
