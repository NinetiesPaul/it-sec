<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculo';

    protected $fillable = [
        'tipo',
        'modelo',
        'fabricante',
        'ano',
        'renavam',
        'cor',
        'placa',
    ];

    public $timestamps = false;
}
