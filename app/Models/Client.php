<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    protected $fillable = [
        'user_id',
        'area_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
