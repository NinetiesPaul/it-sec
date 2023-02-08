<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RequestServices;
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
        $atendimento = RequestServices::getOne($atendimentoId);
        return view('agent.request', [ 'atendimento' => $atendimento ]);
    }

    public function ajaxShowCalls($agent_id)
    {
        $agent = AgentServices::getOne(null, $agent_id);
        $calls = RequestServices::getAll(true);

        $callsForAgentArea = [];
        foreach ($calls as $call) {
            if ($call->client->area_id == $agent->area_id) {
                $call->address = $call->client->user->address;
                $callsForAgentArea[] = $call;
            }
        }

        echo json_encode($callsForAgentArea);
    }

    public function ajaxTakeCall(Request $request)
    {
        RequestServices::assignCall($request);
        return [$request->callId, $request->agentId];
    }
}
