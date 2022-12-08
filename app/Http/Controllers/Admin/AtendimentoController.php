<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AtendimentoServices;
use Illuminate\Http\Request;

class AtendimentoController extends AdminController
{
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
