<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use App\Services\AtendimentoServices;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth:client');
    }

    public function index()
    {
        return view('cliente.index');
    }

    public function call()
    {
        $user = Auth::user();
        return view('cliente.help', [ 'clientId' => $user->isClient->id ]);
    }

    public function store($clientId, Request $request)
    {
        $dispatchId = AtendimentoServices::store($clientId, $request);
        return redirect('call/' . $dispatchId);
    }

    public function viewCall($atendimentoId)
    {
        $atendimento = AtendimentoServices::getOne($atendimentoId);
        return view('cliente.request', [ 'atendimento' => $atendimento ]);
    }

    public function ajaxViewCall($atendimentoId)
    {
        $atendimento = AtendimentoServices::getOne($atendimentoId);
        echo json_encode($atendimento);
    }
}
