<?php

namespace App\Http\Controllers\Users;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }
}
