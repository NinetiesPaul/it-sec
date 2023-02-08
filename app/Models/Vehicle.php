<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = [
        'type',
        'make',
        'model',
        'year',
        'register',
        'color',
        'license',
        'is_available',
    ];

    public $timestamps = false;
}
