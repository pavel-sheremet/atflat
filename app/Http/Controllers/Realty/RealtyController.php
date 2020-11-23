<?php

namespace App\Http\Controllers\Realty;

use App\Realty;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Resources\Realty as RealtyResource;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

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
            'realty' => RealtyResource::collection(Realty::with('main_image', 'metro')
                ->filter($request)
                ->order($request)
                ->paginate(20, ['*'], 'realty_page')
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('realty.create');
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
     * @param Realty $realty
     * @return Response
     */
    public function show(Realty $realty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Realty $realty
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Realty $realty)
    {
        $this->authorize('update', $realty);

        return view('realty.edit', [
            'realty' => new RealtyResource(Realty::with('metro')->find($realty->id))
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Realty $realty
     * @return Response
     */
    public function update(Request $request, Realty $realty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Realty $realty
     * @return Response
     */
    public function destroy(Realty $realty)
    {
        //
    }
}
