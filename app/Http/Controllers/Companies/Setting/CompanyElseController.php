<?php

namespace App\Http\Controllers\Companies\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Http\Requests\Companies\CompanyElseRequest;

use Illuminate\Support\Facades\Auth;

class CompanyElseController extends Controller
{
    public function create()
    {
        $auth = Auth::user();
        $company_user = CompanyUser::where('auth_id', $auth->id)->get()->first();
        $company = Company::findOrFail($company_user->company_id);

        return view('company/setting/companyElse/create', compact('company', 'company_user'));
    }

    public function store(CompanyElseRequest $request)
    {
        $auth = Auth::user();
        $company_user = CompanyUser::where('auth_id', $auth->id)->get()->first();
        $company = Company::findOrFail($company_user->company_id);

        if($company) {
            $company->update($request->all());
            $completed = '変更を保存しました。';

            return redirect()->route('company.setting.companyElse.create')->with('completed', $completed);
        }
    }
}
