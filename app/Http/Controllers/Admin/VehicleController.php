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
        $veiculos = VehicleServices::getAll();
        return view('admin.veiculo.index', [ 'veiculos' => $veiculos ]);
    }

    public function store(Request $request)
    {
        VehicleServices::store($request);
        return redirect('admin/vehicle')->with('success', 'Veiculo cadastrado!');
    }

    public function edit($veiculoId)
    {
        $veiculo = VehicleServices::getOne($veiculoId);
        return view('admin.veiculo.edit', [ 'veiculo' => $veiculo ]);
    }

    public function update($veiculoId, Request $request)
    {
        VehicleServices::update($veiculoId, $request);
        return redirect('admin/vehicle/' . $veiculoId)->with('success', 'Veiculo atualizado!');
    }

    public function usage($veiculoId)
    {
        $veiculo = VehicleServices::getOne($veiculoId);
        $agentes = AgentServices::getAll();
        $historicos = VehicleServices::usageHistory($veiculoId);
        return view('admin.veiculo.usage', [ 'historicos' => $historicos, 'agentes' => $agentes, 'veiculo' => $veiculo ]);
    }

    public function assign($veiculoId, Request $request)
    {
        VehicleServices::setUsage($veiculoId, $request);
        return redirect('admin/vehicle/' . $veiculoId . '/usage');
    }

    public function indexMaintenance($veiculoId)
    {
        $veiculo = VehicleServices::getOne($veiculoId);
        $historicos = VehicleServices::getMaintenanceHistory($veiculoId);
        return view('admin.veiculo.maintenance', [ 'historicos' => $historicos, 'veiculoId' => $veiculoId, 'veiculo' => $veiculo ]);
    }

    public function storeMaintenance($veiculoId, Request $request)
    {
        VehicleServices::setMaintenanceHistory($veiculoId, $request);
        return redirect('admin/vehicle/' . $veiculoId . '/maintenance')->with('success', 'Registro de manutenção cadastrada!');
    }
}
