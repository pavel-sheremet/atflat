<?php

namespace App\Http\Controllers\Agency;

use App\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $agencies = \Auth::user()->agencies()->get();

        return view('agency.profile.index', [
            'agencies' => $agencies
        ]);
    }

    public function show(Agency $agency)
    {
        $this->authorize('viewProfile', $agency);

        return view('agency.profile.show', [
            'agency' => $agency,
        ]);

    }
}
