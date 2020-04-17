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
        $realty = Realty::firstOrCreate([
            'user_id' => $request->input('user_id'),
            'type_id' => $request->input('type_id'),
            'rooms_number_id' => $request->input('rooms_number_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'sub_price' => $request->input('sub_price'),
            'province' => $request->input('province'),
            'geo_area' => $request->input('area'),
            'city_id' => $request->input('city_id'),
            'vegetation' => $request->input('vegetation'),
            'district' => $request->input('district'),
            'street' => $request->input('street'),
            'house' => $request->input('house'),
        ], $request->all());


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
            'realty' => new RealtyResource(Realty::with('metro', 'type', 'images', 'main_image', 'rent_period')->find($id))
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

        __('realty.create.input.rent_period.label');

        return \response(new RealtyResource($realty));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
