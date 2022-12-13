<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        'client_id',
        'created_on',
        'description',
        'awnsered_by',
        'awnsered_on',
        'ended_by',
        'ended_on',
    ];

    public $timestamps = false;

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
