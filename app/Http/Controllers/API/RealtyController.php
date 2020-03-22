<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealty;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\RealtyRoomsNumber as RealtyRoomsNumberResource;
use App\Http\Resources\RealtyType as RealtyTypeResource;
use App\Metro;
use App\RealtyRoomsNumber;
use App\RealtyType;
use Faker\Generator;
use Illuminate\Http\Request;
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
            $city = City::firstOrCreate(['name' => $request->input('geo.locality')]);

            $realty = \Auth::user()->realty()->make([
                'type_id' => $request->type,
                'price' => $request->price,
                'sub_price' => $request->sub_price,
                'description' => $request->description,
                'rooms_number_id' => $request->rooms_number,
                'lat' => $request->input('geo.coords')[0],
                'long' => $request->input('geo.coords')[1],
                'province' => $request->input('geo.province'),
                'geo_area' => $request->input('geo.area'),
                'city_id' => $city->id,
                'vegetation' => $request->input('geo.vegetation'),
                'district' => $request->input('geo.district'),
                'street' => $request->input('geo.street'),
                'house' => $request->input('geo.house'),
            ]);

            $realty->save();

            foreach ($request->input('geo.metro') as $requestMetro)
            {
                $metro = Metro::firstOrCreate([
                    'name' => $requestMetro['name'],
                    'city_id' => $city->id
                ]);

                $realty->metro()->attach($metro->id, [
                    'distance' => $requestMetro['distance']
                ]);
            }

            return \response(new RealtyResource($realty));
        }
        catch (\Exception $e)
        {
            $realty->delete();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
