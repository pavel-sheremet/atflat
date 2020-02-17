<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Http\Requests\StoreAgency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::where('active', true)->get();

        return view('agency.index', [
            'agencies' => $agencies
        ]);
    }

    public function profile()
    {
        $agencies = \Auth::user()->agencies()->get();

        return view('agency.profile.index', [
            'agencies' => $agencies
        ]);
    }

    public function profileShow(Agency $agency)
    {
        /**
         * TODO: сделать редирект в случае unauthorized
         * https://laracasts.com/discuss/channels/laravel/policy-authorize-redirect-instead-of-403?page=0
         */
        $this->authorize('viewProfile', $agency);

        return view('agency.profile.show', [
            'agency' => $agency,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgency $request)
    {
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->user_id = \Auth::id();
        $agency->save();

        return redirect()->route('agency.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
