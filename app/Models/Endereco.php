<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'street',
        'number',
        'detail1',
        'zip',
        'city',
        'detail2',
        'state_id',
    ];

    public $timestamps = false;
}
