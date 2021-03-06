<?php

namespace App\Http\Controllers\Owners;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\GymInfo;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $gyms = GymInfo::where('owner_id', $auth->id)->get();
        // return $auth;
        return view('owner.dashboard.index', compact('gyms'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
