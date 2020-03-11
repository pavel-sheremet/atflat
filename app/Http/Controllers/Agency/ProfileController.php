<?php

namespace App\Http\Controllers\Agency;

use App\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agency as AgencyResource;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profile.agency.index', [
            'agencies' => AgencyResource::collection(
                auth()->user()
                    ->agencies()
                    ->filter($request)
                    ->order($request)
                    ->paginate(10)
            ),
            'filters' => \RequestHelper::getFilters(),
            'order' => \RequestHelper::getOrder(),
            'filters_number' => \RequestHelper::getFiltersNumber()
        ]);
    }

    public function show(Agency $agency)
    {
        $this->authorize('viewProfile', $agency);

        return view('profile.agency.show', [
            'agency' => $agency,
        ]);
    }
}
