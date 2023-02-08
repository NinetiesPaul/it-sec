<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Requests extends Model
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

    public function awnseredBy() {
        return $this->belongsTo(Agent::class, 'awnsered_by');
    }

    public function endedBy() {
        return $this->belongsTo(Agent::class, 'ended_by');
    }
}
