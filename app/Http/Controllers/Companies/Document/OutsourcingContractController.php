<?php

namespace App\Http\Controllers\Companies\Document;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\CompanyUser;

class OutsourcingContractController extends Controller
{

    public function create()
    {
        $auth = Auth::user();
        $company_user = CompanyUser::where('auth_id', $auth->id)->first();

        return view('company/document/OutsourcingContract/create', compact('company_user'));
    }

    public function show($id)
    {
        $auth = Auth::user();
        $company_user = CompanyUser::where('auth_id', $auth->id)->first();

        return view('company/document/OutsourcingContract/show', compact('company_user'));
    }
}