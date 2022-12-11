<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserServices;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function emailCheck(Request $request)
    {
        $emailTaken = false;
        switch ($request->type) {
            case 'client':
                $emailTaken = (UserServices::getClientByEmail($request->email, $request->userId)) ? true : false;
                break;
            case 'agent':
                $emailTaken = (UserServices::getAgentByEmail($request->email, $request->userId)) ? true : false;
                break;
        }
        echo json_encode($emailTaken);
    }
}
