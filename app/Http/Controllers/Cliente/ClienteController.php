<?php

namespace App\Http\Controllers\Cliente;


use App\Http\Controllers\Controller;
use App\Services\AgenteServices;

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

    public function help()
    {
        return view('cliente.help', [ 'clienteId' => 1 ]);
    }
}
