<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgenteServices;
use App\Services\VeiculoServices;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $veiculos = VeiculoServices::getAll();
        return view('admin.veiculo.index', [ 'veiculos' => $veiculos ]);
    }

    public function store(Request $request)
    {
        VeiculoServices::store($request);
        return redirect('admin/veiculo');
    }

    public function edit($veiculoId)
    {
        $veiculo = VeiculoServices::getOne($veiculoId);
        return view('admin.veiculo.edit', [ 'veiculo' => $veiculo ]);
    }

    public function update($veiculoId, Request $request)
    {
        VeiculoServices::update($veiculoId, $request);
        return redirect('admin/veiculo/' . $veiculoId);
    }

    public function usage($veiculoId)
    {
        $agentes = AgenteServices::getAll();
        $historicos = VeiculoServices::usageHistory($veiculoId);
        return view('admin.veiculo.usage', [ 'historicos' => $historicos, 'agentes' => $agentes, 'veiculoId' => $veiculoId ]);
    }

    public function assign($veiculoId, Request $request)
    {
        VeiculoServices::setUsage($veiculoId, $request);
        return redirect('admin/veiculo/' . $veiculoId . '/uso');
    }

    public function indexMaintenance($veiculoId)
    {
        $historicos = VeiculoServices::getMaintenanceHistory($veiculoId);
        return view('admin.veiculo.maintenance', [ 'historicos' => $historicos, 'veiculoId' => $veiculoId ]);
    }

    public function storeMaintenance($veiculoId, Request $request)
    {
        VeiculoServices::setMaintenanceHistory($veiculoId, $request);
        return redirect('admin/veiculo/' . $veiculoId . '/manutencao');
    }
}
