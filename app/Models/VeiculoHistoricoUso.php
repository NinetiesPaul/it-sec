<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VeiculoHistoricoUso extends Model
{
    protected $table = 'vehicle_usage_history';

    protected $fillable = [
        'id',
        'vehicle_id',
        'agent_id',
        'started_on',
        'ended_on',
    ];

    public $timestamps = false;

    public function vehicle() {
        return $this->hasOne(Veiculo::class, 'id', 'vehicle_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
