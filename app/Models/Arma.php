<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    protected $table = 'arma';

    protected $fillable = [
        'tipo',
        'fabricante',
        'modelo',
        'n_serie',
        'observacoes',
    ];

    public $timestamps = false;
}
