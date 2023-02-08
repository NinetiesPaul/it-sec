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
        $users = ClientServices::getAll();
        $states = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.cliente.index', [ 'users' => $users, 'states' => $states, 'areas' => $areas ]);
    }

    public function store(Request $request)
    {
        ClientServices::store($request);
        return redirect('admin/client')->with('success', 'Client create!');
    }

    public function edit($userId)
    {
        $user = ClientServices::getOne($userId);
        $states = StateServices::getAll();
        $areas = AreaServices::getAll();
        return view('admin.cliente.edit', [ 'user' => $user, 'states' => $states, 'areas' => $areas ]);
    }

    public function update($userId, Request $request)
    {
        ClientServices::update($userId, $request);
        return redirect('admin/client/' . $userId)->with('success', 'Client updated!');
    }
}
