<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use App\Services\RequestServices;
use Illuminate\Http\Request;

class RequestController extends Controller
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
        $atendimentos = RequestServices::getAll();
        return view('admin.index');
    }

    public function show($clienteId, $atendimentoId)
    {
        $atendimento = RequestServices::getOne($atendimentoId, $clienteId);
        return view('cliente.request', [ 'atendimento' => $atendimento ]);
    }

    public function store($clienteId, Request $request)
    {
        $clienteId = 1;
        $atendimentoId = RequestServices::store($clienteId, $request);
        return redirect('cliente/' . $clienteId . '/atendimento/' . $atendimentoId);
    }
}
