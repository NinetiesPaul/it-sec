<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\ClientServices;
use App\Services\StateServices;
use App\Services\AreaServices;
use Illuminate\Http\Request;

class ClientController extends AdminController
{
    public function index()
    {
        $clientes = ClientServices::getAll();
        $estados = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.cliente.index', [ 'usuarios' => $clientes, 'estados' => $estados, 'areas' => $areas ]);
    }

    public function store(Request $request)
    {
        ClientServices::store($request);
        return redirect('admin/client')->with('success', 'Cliente cadastrado!');
    }

    public function edit($usuarioId)
    {
        $cliente = ClientServices::getOne($usuarioId);
        $estados = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.cliente.edit', [ 'usuario' => $cliente, 'estados' => $estados, 'areas' => $areas ]);
    }

    public function update($usuarioId, Request $request)
    {
        ClientServices::update($usuarioId, $request);
        return redirect('admin/client/' . $usuarioId)->with('success', 'Cliente atualizado!');
    }
}
