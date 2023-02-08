<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VehicleMaintenanceHistory extends Model
{
    protected $table = 'vehicle_maintenance_history';

    protected $fillable = [
        'id',
        'vehicle_id',
        'started_on',
        'ended_on',
        'location',
        'cost',
        'description',
    ];

    public $timestamps = false;
}
