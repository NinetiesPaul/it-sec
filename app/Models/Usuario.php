<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'mail',
        'pass',
        'tel1',
        'tel2',
        'salt',
        'avatar',
        'endereco_id',
    ];

    public $timestamps = false;
}
