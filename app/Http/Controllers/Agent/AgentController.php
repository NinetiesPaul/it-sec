<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AtendimentoServices;
use App\Services\AgentServices;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:agent');
    }

    public function index()
    {
        $user = Auth::user();
        return view('agent.index', [ 'agent' => $user ]);
    }

    public function showCall($atendimentoId)
    {
        $atendimento = AtendimentoServices::getOne($atendimentoId);
        return view('cliente.request', [ 'atendimento' => $atendimento ]);
    }

    public function ajaxShowCalls($agent_id)
    {
        $agent = AgentServices::getOne(null, $agent_id);
        $calls = AtendimentoServices::getAll(true);

        $callsForAgentArea = [];
        foreach ($calls as $call) {
            if ($call->client->area_id == $agent->area_id) {
                $callsForAgentArea[] = $call;
            }
        }

        echo json_encode($callsForAgentArea);
    }
}
