<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealty;
use App\Http\Resources\Realty as RealtyResource;
use App\Http\Resources\RealtyRoomsNumber as RealtyRoomsNumberResource;
use App\Http\Resources\RealtyType as RealtyTypeResource;
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
        $faker  = new Generator();
        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));

        try
        {
            $realty = \Auth::user()->realty()->make([
                'type_id' => $request->type,
                'price' => $request->price,
                'sub_price' => $request->sub_price,
                'description' => $request->description,
                'rooms_number_id' => $request->rooms_number,
                'lat' => $faker->latitude,
                'long' => $faker->longitude,
                'city_id' => City::inRandomOrder()->first()->id,
                'street' => $faker->streetName,
            ]);

            $realty->save();

            return \response(new RealtyResource($realty));
        }
        catch (\Exception $e)
        {
            return \response($e->getMessage());
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
