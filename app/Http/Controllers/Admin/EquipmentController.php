<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgentServices;
use App\Services\EquipmentServices;
use Illuminate\Http\Request;

class EquipmentController extends AdminController
{
    public function index()
    {
        $armas = EquipmentServices::getAll();
        return view('admin.arma.index', [ 'armas' => $armas ]);
    }

    public function store(Request $request)
    {
        EquipmentServices::store($request);
        return redirect('admin/equipment')->with('success', 'Equipamento cadastrado!');
    }

    public function edit($armaId)
    {
        $arma = EquipmentServices::getOne($armaId);
        return view('admin.arma.edit', [ 'arma' => $arma ]);
    }

    public function update($armaId, Request $request)
    {
        EquipmentServices::update($armaId, $request);
        return redirect('admin/equipment/' . $armaId)->with('success', 'Equipamento atualizado!');
    }

    public function usage($armaId)
    {
        $arma = EquipmentServices::getOne($armaId);
        $agentes = AgentServices::getAll();
        $historicos = EquipmentServices::usageHistory($armaId);
        return view('admin.arma.usage', [ 'historicos' => $historicos, 'agentes' => $agentes, 'arma' => $arma ]);
    }

    public function assign($armaId, Request $request)
    {
        EquipmentServices::setUsage($armaId, $request);
        return redirect('admin/equipment/' . $armaId . '/usage');
    }
}
