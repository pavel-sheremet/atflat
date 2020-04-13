<?php

namespace App\Http\Controllers\Agency;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgencyRequest;
use App\Http\Resources\Agency as AgencyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('agency.index', [
            'agencies' => AgencyResource::collection(Agency::filter($request)
                ->order($request)
                ->paginate(10)),
            'filters' => \RequestHelper::getFilters(),
            'order' => \RequestHelper::getOrder(),
            'filters_number' => collect(\RequestHelper::getFiltersNumber())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(AgencyRequest $request)
    {
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->user_id = \Auth::id();
        $agency->save();

        return redirect()->route('profile.agency');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return Response
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agency  $agency
     * @return Response
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
