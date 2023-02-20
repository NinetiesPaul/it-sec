<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgentServices;
use App\Services\VehicleServices;
use Illuminate\Http\Request;

class VehicleController extends AdminController
{
    public function index()
    {
        $vehicles = VehicleServices::getAll();
        return view('admin.veiculo.index', [ 'vehicles' => $vehicles ]);
    }

    public function store(Request $request)
    {
        VehicleServices::store($request);
        return redirect('admin/vehicle')->with('success', 'Vehicle created!');
    }

    public function edit($vehicleId)
    {
        $vehicle = VehicleServices::getOne($vehicleId);
        return view('admin.veiculo.edit', [ 'vehicle' => $vehicle ]);
    }

    public function update($vehicleId, Request $request)
    {
        VehicleServices::update($vehicleId, $request);
        return redirect('admin/vehicle/' . $vehicleId)->with('success', 'Vehicle updated!');
    }

    public function usage($vehicleId)
    {
        $vehicle = VehicleServices::getOne($vehicleId);
        $agents = AgentServices::getAll();
        $assignments = VehicleServices::usageHistory($vehicleId);
        return view('admin.veiculo.usage', [ 'assignments' => $assignments, 'agents' => $agents, 'vehicle' => $vehicle ]);
    }

    public function assign($vehicleId, Request $request)
    {
        VehicleServices::setUsage($vehicleId, $request);
        return redirect('admin/vehicle/' . $vehicleId . '/usage');
    }

    public function indexMaintenance($vehicleId)
    {
        $vehicle = VehicleServices::getOne($vehicleId);
        $histories = VehicleServices::getMaintenanceHistory($vehicleId);
        return view('admin.veiculo.maintenance', [ 'histories' => $histories, 'vehicleId' => $vehicleId, 'vehicle' => $vehicle ]);
    }

    public function storeMaintenance($vehicleId, Request $request)
    {
        VehicleServices::setMaintenanceHistory($vehicleId, $request);
        return redirect('admin/vehicle/' . $vehicleId . '/maintenance')->with('success', 'Registro de manutenção cadastrada!');
    }
}
