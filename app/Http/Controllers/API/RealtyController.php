<?php

namespace App\Http\Controllers\API;

use App\Events\RealtyCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealty;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\RealtyRoomsNumber as RealtyRoomsNumberResource;
use App\Http\Resources\RealtyType as RealtyTypeResource;
use App\Realty;
use App\RealtyRoomsNumber;
use App\RealtyType;
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRealty $request
     * @return Response
     */
    public function store(StoreRealty $request)
    {
        try
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
        catch (\Exception $e)
        {
//            return \response($e->getMessage());

            return \response('internal error', 500);
        }
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
            'realty' => new RealtyResource(Realty::with('metro', 'type')->find($id))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRealty $request
     * @param Realty $realty
     * @return Response
     */
    public function update(StoreRealty $request, Realty $realty)
    {
        try
        {
            $this->authorize('update', $realty);
            $realty->update($request->all());

            event(new RealtyCreated($realty, $request));

            return \response(new RealtyResource($realty));
        }
        catch (\Exception $e)
        {
//            return \response($e->getMessage());

            return \response('internal error', 500);
        }


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
