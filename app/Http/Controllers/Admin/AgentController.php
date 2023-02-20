<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Services\AgentServices;
use App\Services\StateServices;
use App\Services\AreaServices;
use Illuminate\Http\Request;

class AgentController extends AdminController
{
    public function index()
    {
        $agents = AgentServices::getAll();
        $states = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.agente.index', [ 'users' => $agents, 'states' => $states, 'areas' => $areas ]);
    }

    public function store(Request $request)
    {
        AgentServices::store($request);
        return redirect('admin/agent')->with('success', 'Agent created!');
    }

    public function edit($userId)
    {
        $agent = AgentServices::getOne($userId);
        $states = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.agente.edit', [ 'user' => $agent, 'states' => $states, 'areas' => $areas ]);
    }

    public function update($userId, Request $request)
    {
        AgentServices::update($userId, $request);
        return redirect('admin/agent/' . $userId)->with('success', 'Agent updated!');
    }

    public function usage($userId)
    {
        $usage = AgentServices::usage($userId);

        $equipments = $usage[0];
        $vehicles = $usage[1];

        return view('admin.agente.usage', [ 'equipments' => $equipments, 'vehicles' => $vehicles ]);
    }
}
