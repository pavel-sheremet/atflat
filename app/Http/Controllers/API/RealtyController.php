<?php

namespace App\Http\Controllers\API;

use App\Events\RealtyCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\RealtyRequest;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\RealtyRoomsNumber as RealtyRoomsNumberResource;
use App\Http\Resources\RealtyType as RealtyTypeResource;
use App\Http\Resources\RentPeriod as RentPeriodResource;
use App\Realty;
use App\RealtyRoomsNumber;
use App\RealtyType;
use App\RentPeriod;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class RealtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response([
            'type' => RealtyTypeResource::collection(RealtyType::all()),
            'rooms_number' => RealtyRoomsNumberResource::collection(RealtyRoomsNumber::all()),
            'rent_period' => RentPeriodResource::collection(RentPeriod::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RealtyRequest $request
     * @return Response
     */
    public function store(RealtyRequest $request)
    {
        $realty = \Auth::user()->realty()->create($request->all());

        event(new RealtyCreated($realty, $request));

        return \response(new RealtyResource($realty));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return response([
            'type' => RealtyTypeResource::collection(RealtyType::all()),
            'rooms_number' => RealtyRoomsNumberResource::collection(RealtyRoomsNumber::all()),
            'rent_period' => RentPeriodResource::collection(RentPeriod::all()),
            'realty' => new RealtyResource(\Auth::user()->realty()->with('metro', 'type', 'images', 'main_image', 'rent_period')->find($id))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RealtyRequest $request
     * @param Realty $realty
     * @return Response
     * @throws AuthorizationException
     */
    public function update(RealtyRequest $request, Realty $realty)
    {
        $this->authorize('update', $realty);
        $realty->update($request->all());

        event(new RealtyCreated($realty, $request));

        return response()->json(new RealtyResource($realty));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response()->json(\Auth::user()->realty()->find($id)->delete());
    }
}
