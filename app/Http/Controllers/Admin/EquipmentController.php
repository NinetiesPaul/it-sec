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
        $equipments = EquipmentServices::getAll();
        return view('admin.arma.index', [ 'equipments' => $equipments ]);
    }

    public function store(Request $request)
    {
        EquipmentServices::store($request);
        return redirect('admin/equipment')->with('success', 'Equipment created!');
    }

    public function edit($equipmentId)
    {
        $arma = EquipmentServices::getOne($equipmentId);
        return view('admin.arma.edit', [ 'equipment' => $equipment ]);
    }

    public function update($equipmentId, Request $request)
    {
        EquipmentServices::update($equipmentId, $request);
        return redirect('admin/equipment/' . $equipmentId)->with('success', 'Equipment updated!');
    }

    public function usage($equipmentId)
    {
        $equipment = EquipmentServices::getOne($equipmentId);
        $agents = AgentServices::getAll();
        $assignments = EquipmentServices::usageHistory($equipmentId);
        return view('admin.arma.usage', [ 'assignments' => $assignments, 'agents' => $agents, 'equipment' => $equipment ]);
    }

    public function assign($equipmentId, Request $request)
    {
        EquipmentServices::setUsage($equipmentId, $request);
        return redirect('admin/equipment/' . $equipmentId . '/usage');
    }
}
