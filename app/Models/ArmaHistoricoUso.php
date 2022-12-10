<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArmaHistoricoUso extends Model
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
        return $this->hasOne(Arma::class, 'id', 'equipment_id');
    }
}
