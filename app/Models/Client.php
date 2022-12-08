<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = [
        'usuario_id',
        'area_id',
    ];

    public $timestamps = false;
}
