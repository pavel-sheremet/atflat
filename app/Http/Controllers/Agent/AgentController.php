<?php

namespace App\Http\Controllers\Agent;

use App\Agent;
use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgent as StoreAgentRequest;
use App\Http\Resources\Agency as AgencyResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Request as RequestHelper;
use App\Http\Resources\Agent as AgentResource;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function index(Request $request)
    {
        return view('agent.index', [
            'agents' => AgentResource::collection(Agent::with('user')
                ->filter($request)
                ->order($request)
                ->paginate(10)
            ),
            'agencies' => AgencyResource::collection(Agency::all()),
            'filters' => RequestHelper::getFilters(),
            'order' => RequestHelper::getOrder(),
            'filtersNumber' => RequestHelper::getFiltersNumber()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('agent.create', [
            'agencies' => AgencyResource::collection(Agency::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAgentRequest $request
     * @return Response
     */
    public function store(StoreAgentRequest $request)
    {
        $agent = new Agent();
        $agent->create($request->validated());

        return redirect()->route('agent.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return Response
     */
    public function show(Agent $agent)
    {
        //
    }

    public function profile()
    {
        return view('agent.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Agent  $agent
     * @return Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
