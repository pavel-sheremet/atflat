<?php

namespace App\Http\Controllers\Agency\Realty;

use App\Agency;
use App\Agent;
use App\Http\Controllers\Controller;
use App\Realty;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Agency $agency
     * @return void
     */
    public function index(Agency $agency)
    {
        \DB::connection()->enableQueryLog();
//        $realty = $agency->realty()
//            ->withoutGlobalScopes()
//            ->with('user', 'user.agent')
//            ->get();

        $agencies = Agency::with('realty')
            ->withCount('realty')
            ->orderBy('realty_count')
            ->paginate(3);

        foreach ($agencies as $agency)
        {
            dump($agency->name . ' - ' . $agency->realty->count());
        }


//        dump($realty);

        dd(\DB::getQueryLog());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
