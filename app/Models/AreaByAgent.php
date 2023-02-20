<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AreaByAgent extends Model
{
    protected $table = 'area_by_agent';

    protected $fillable = [
        'area_id',
        'agent_id',
        'started_on',
        'ended_on',
    ];

    public $timestamps = false;

    public function agent() {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
