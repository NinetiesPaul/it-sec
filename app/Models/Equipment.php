<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'type',
        'make',
        'model',
        'sn',
        'notes',
        'is_available'
    ];

    public $timestamps = false;
}
