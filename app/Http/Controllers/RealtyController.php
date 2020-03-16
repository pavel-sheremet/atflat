<?php

namespace App\Http\Controllers;

use App\Realty;
use Illuminate\Http\Request;
use App\Http\Resources\Realty as RealtyResource;
use Illuminate\Http\Response;

class RealtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('realty.index', [
            'realty' => RealtyResource::collection(Realty::with('agency')
                ->filter($request)
//                ->order($request)
                ->paginate(2, ['*'], 'realty_page')
            ),
//            'agency' => new AgencyResource($agency),
//            'agents' => AgentResource::collection($agency->agents()->with('user')->get()),
//            'filter' => [
//                'number' => \RequestHelper::getFiltersNumber(),
//                'data' => \RequestHelper::getFilters(),
//            ]
//            'agencies_filter' => AgencyResource::collection(Agency::all()),
//            'agencies' => AgencyResource::collection(Agency::paginate(10, ['*'], 'agency_page')),
//            'filters' => \RequestHelper::getFilters(),
//            'order' => \RequestHelper::getOrder(),
//            'filters_number' => \RequestHelper::getFiltersNumber(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Realty  $realty
     * @return Response
     */
    public function show(Realty $realty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Realty  $realty
     * @return Response
     */
    public function edit(Realty $realty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Realty  $realty
     * @return Response
     */
    public function update(Request $request, Realty $realty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Realty  $realty
     * @return Response
     */
    public function destroy(Realty $realty)
    {
        //
    }
}
