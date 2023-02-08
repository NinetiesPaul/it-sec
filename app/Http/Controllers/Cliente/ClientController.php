<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\RequestServices;

class ClientController extends Controller
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

    public function calls()
    {
        $user = Auth::user();
        $dispatches = RequestServices::getAll(false, $user->isClient->id);
        return view('cliente.requests', [ 'dispatches' => $dispatches ]);
    }

    public function store($clientId, Request $request)
    {
        $dispatchId = RequestServices::store($clientId, $request);
        return redirect('call/' . $dispatchId);
    }

    public function viewCall($atendimentoId)
    {
        $atendimento = RequestServices::getOne($atendimentoId);
        return view('cliente.request', [ 'atendimento' => $atendimento ]);
    }

    public function ajaxViewCall($atendimentoId)
    {
        $atendimento = RequestServices::getOne($atendimentoId);
        echo json_encode($atendimento);
    }
}
