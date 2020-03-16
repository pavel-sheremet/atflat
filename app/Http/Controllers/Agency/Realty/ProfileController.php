<?php

namespace App\Http\Controllers\Agency\Realty;

use App\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\Agency as AgencyResource;
use App\Http\Resources\Agent as AgentResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Agency $agency
     * @param Request $request
     * @return void
     * @throws AuthorizationException
     */
    public function index(Agency $agency, Request $request)
    {
        $this->authorize('viewProfile', $agency);

        return view('profile.agency.realty.index', [
            'realty' => RealtyResource::collection($agency->realty()
                ->filter($request)
//                ->order($request)
                ->paginate(2, ['*'], 'realty_page')
            ),
            'agency' => new AgencyResource($agency),
            'agents' => AgentResource::collection($agency->agents()->with('user')->get()),
            'filter' => [
                'number' => \RequestHelper::getFiltersNumber(),
                'data' => \RequestHelper::getFilters(),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Agency $agency
     * @return void
     * @throws AuthorizationException
     */
    public function create(Agency $agency)
    {
        $this->authorize('viewProfile', $agency);

        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
