<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\ClienteServices;
use App\Services\EstadoServices;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = ClienteServices::getAll();
        $estados = EstadoServices::getAll();
        return view('admin.cliente.index', [ 'usuarios' => $clientes, 'estados' => $estados]);
    }

    public function store(Request $request)
    {
        ClienteServices::store($request);
        return redirect('admin/cliente');
    }

    public function edit($usuarioId)
    {
        $cliente = ClienteServices::getOne($usuarioId);
        $estados = EstadoServices::getAll();
        return view('admin.cliente.edit', [ 'usuario' => $cliente, 'estados' => $estados ]);
    }

    public function update($usuarioId, Request $request)
    {
        ClienteServices::update($usuarioId, $request);
        return redirect('admin/cliente/' . $usuarioId);
    }
}
