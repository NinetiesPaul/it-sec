<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'complemento',
        'estado_id',
    ];

    public $timestamps = false;
}
