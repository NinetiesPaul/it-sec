<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EquipmentUsageHistory extends Model
{
    protected $table = 'equipment_history';

    protected $fillable = [
        'id',
        'equipment_id',
        'agent_id',
        'started_on',
        'ended_on',
    ];

    public $timestamps = false;

    public function equipment() {
        return $this->hasOne(Equipment::class, 'id', 'equipment_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
