<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Services\AgenteServices;
use App\Services\EstadoServices;
use Illuminate\Http\Request;

class AgenteController extends Controller
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
        $agentes = AgenteServices::getAll();
        $estados = EstadoServices::getAll();
        return view('admin.agente.index', [ 'usuarios' => $agentes, 'estados' => $estados]);
    }

    public function store(Request $request)
    {
        AgenteServices::store($request);
        return redirect('admin/agente');
    }

    public function edit($usuarioId)
    {
        $agente = AgenteServices::getOne($usuarioId);
        $estados = EstadoServices::getAll();
        return view('admin.agente.edit', [ 'usuario' => $agente, 'estados' => $estados ]);
    }

    public function update($usuarioId, Request $request)
    {
        AgenteServices::update($usuarioId, $request);
        return redirect('admin/agente/' . $usuarioId);
    }

    public function usage($usuarioId)
    {
        $usage = AgenteServices::usage($usuarioId);

        $armas = $usage[0];
        $veiculos = $usage[1];

        return view('admin.agente.usage', [ 'armas' => $armas, 'veiculos' => $veiculos ]);
    }
}
