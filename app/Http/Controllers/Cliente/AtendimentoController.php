<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use App\Services\AtendimentoServices;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
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
        $atendimentos = AtendimentoServices::getAll();
        return view('admin.index');
    }

    public function show($clienteId, $atendimentoId)
    {
        $atendimento = AtendimentoServices::getOne($atendimentoId, $clienteId);
        return view('cliente.expand_help', [ 'atendimento' => $atendimento ]);
    }

    public function store($clienteId, Request $request)
    {
        $clienteId = 2;
        $atendimentoId = AtendimentoServices::store($clienteId, $request);
        return redirect('cliente/' . $clienteId . '/atendimento/' . $atendimentoId);
    }
}
