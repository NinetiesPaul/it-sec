<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\AgenteServices;
use App\Services\ArmaServices;
use Illuminate\Http\Request;

class ArmaController extends Controller
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
        $armas = ArmaServices::getAll();
        return view('admin.arma.index', [ 'armas' => $armas ]);
    }

    public function store(Request $request)
    {
        ArmaServices::store($request);
        return redirect('admin/arma');
    }

    public function edit($armaId)
    {
        $arma = ArmaServices::getOne($armaId);
        return view('admin.arma.edit', [ 'arma' => $arma ]);
    }

    public function update($armaId, Request $request)
    {
        ArmaServices::update($armaId, $request);
        return redirect('admin/arma/' . $armaId);
    }

    public function usage($armaId)
    {
        $agentes = AgenteServices::getAll();
        $historicos = ArmaServices::usageHistory($armaId);
        return view('admin.arma.usage', [ 'historicos' => $historicos, 'agentes' => $agentes, 'armaId' => $armaId ]);
    }

    public function assign($armaId, Request $request)
    {
        ArmaServices::setUsage($armaId, $request);
        return redirect('admin/arma/' . $armaId . '/uso');
    }
}
