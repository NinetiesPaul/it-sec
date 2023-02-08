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
        return redirect('admin/agent')->with('success', 'Agente cadastrado!');
    }

    public function edit($usuarioId)
    {
        $agente = AgentServices::getOne($usuarioId);
        $estados = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.agente.edit', [ 'user' => $agente, 'states' => $estados, 'areas' => $areas ]);
    }

    public function update($usuarioId, Request $request)
    {
        AgentServices::update($usuarioId, $request);
        return redirect('admin/agent/' . $usuarioId)->with('success', 'Agente atualizado!');
    }

    public function usage($usuarioId)
    {
        $usage = AgentServices::usage($usuarioId);

        $armas = $usage[0];
        $veiculos = $usage[1];

        return view('admin.agente.usage', [ 'armas' => $armas, 'veiculos' => $veiculos ]);
    }
}
