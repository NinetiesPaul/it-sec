<?php

namespace App\Http\Controllers\Admin;


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
        //
    }

    public function show($atendimentoId)
    {
        $atendimento = AtendimentoServices::getOne($atendimentoId);
        echo json_encode($atendimento);
    }

    public function counter()
    {
        $counter = AtendimentoServices::counter();
        echo $counter;
    }
}
