<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgentServices;
use App\Services\ArmaServices;
use Illuminate\Http\Request;

class ArmaController extends AdminController
{
    public function index()
    {
        $armas = ArmaServices::getAll();
        return view('admin.arma.index', [ 'armas' => $armas ]);
    }

    public function store(Request $request)
    {
        ArmaServices::store($request);
        return redirect('admin/equipment');
    }

    public function edit($armaId)
    {
        $arma = ArmaServices::getOne($armaId);
        return view('admin.arma.edit', [ 'arma' => $arma ]);
    }

    public function update($armaId, Request $request)
    {
        ArmaServices::update($armaId, $request);
        return redirect('admin/equipment/' . $armaId);
    }

    public function usage($armaId)
    {
        $agentes = AgentServices::getAll();
        $historicos = ArmaServices::usageHistory($armaId);
        return view('admin.arma.usage', [ 'historicos' => $historicos, 'agentes' => $agentes, 'armaId' => $armaId ]);
    }

    public function assign($armaId, Request $request)
    {
        ArmaServices::setUsage($armaId, $request);
        return redirect('admin/equipment/' . $armaId . '/usage');
    }
}
