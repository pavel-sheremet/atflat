<?php

namespace App\Http\Controllers\Agent;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('agent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(StoreAgent $request)
    {
        $agent = new Agent();
        $agent->user_id = \Auth::id();
        $agent->agency_id = $request->agency_id;
        $agent->save();

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
     * @param  \Illuminate\Http\Request  $request
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
