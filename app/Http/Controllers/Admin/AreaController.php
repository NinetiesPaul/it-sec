<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgentServices;
use App\Services\AreaServices;
use Illuminate\Http\Request;

class AreaController extends AdminController
{
    public function index()
    {
        $areas = AreaServices::getAll();
        return view('admin.area.index', [ 'areas' => $areas ]);
    }

    public function store(Request $request)
    {
        AreaServices::store($request);
        return redirect('admin/area')->with('success', 'Area created!');
    }

    public function edit($areaId)
    {
        $area = AreaServices::getOne($areaId);
        return view('admin.area.edit', [ 'area' => $area ]);
    }

    public function update($areaId, Request $request)
    {
        AreaServices::update($areaId, $request);
        return redirect('admin/area/' . $areaId)->with('success', 'Area updated!');
    }

    public function usage($areaId)
    {
        $area = AreaServices::getOne($areaId);
        $agents = AgentServices::getAll();
        $assignments = AreaServices::usageHistory($areaId);
        return view('admin.area.usage', [ 'assignments' => $assignments, 'agents' => $agents, 'area' => $area ]);
    }

    public function assign($areaId, Request $request)
    {
        AreaServices::setUsage($areaId, $request);
        return redirect('admin/area/' . $areaId . '/usage');
    }
}
