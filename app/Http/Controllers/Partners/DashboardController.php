<?php

namespace App\Http\Controllers\Partners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectPartner;
use App\Models\TaskPartner;
use App\Models\Task;
use App\Models\Nda;
use App\Models\Contract;
use App\Models\PurchaseOrder;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner_auth_id = Auth::user()->id;
        $partner_id = Partner::where('partner_id', $partner_auth_id)->get()->first()->id;
        $partner = Partner::where('partner_id', $partner_auth_id)->get()->first();
        $projects = ProjectPartner::where('user_id', $partner_id)->get();
        $tasks = Task::where('partner_id', $partner_id)->get();
        $ndas = Nda::where('partner_id', $partner_id)->where('status', 0)->get();
        $contracts = Contract::where('partner_id', $partner_id)->where('status', 0)->get();
        $purchaseOrders = PurchaseOrder::where('partner_id', $partner_id)->where('status', 0)->get();
        $invoices = Invoice::where('partner_id', $partner_id)->get();

        return view('partner/dashboard/index', compact(['projects', 'tasks', 'partner', 'invoices', 'purchaseOrders', 'ndas']));
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
