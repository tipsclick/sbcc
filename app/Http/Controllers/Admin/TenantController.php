<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::get()->groupBy('floor');
        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $tenant                 = new Tenant;
        $tenant->office_no      = $request->office_no;
        $tenant->floor          = $request->floor;
        $tenant->business_name  = $request->business_name;
        $tenant->name           = $request->name;
        $tenant->cnic           = $request->cnic;
        $tenant->mobile         = $request->mobile;
        $tenant->area           = $request->area;
        $tenant->monthly_rent   = $request->monthly_rent;
        $tenant->home_address   = $request->home_address;
        $tenant->details        = $request->details;
        $tenant->added_by       = auth()->user()->id;
        $tenant->rate           = $request->rate;
        $tenant->start_date       = $request->start_date;
        $tenant->revision_date    = $request->revision_date;
        $tenant->expiry_date      = $request->expiry_date;
        $tenant->office_type      = $request->office_type;
        $tenant->service_charges  = $request->service_charges;
        $tenant->save();
        return redirect()->route('admin.tenants.index')->with('message', 'New Tenant Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        return view('admin.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::where('id',$id)->first();
        return view('admin.tenants.edit', compact('tenant'));
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
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $tenant                 = Tenant::find($id);
        $tenant->office_no      = $request->office_no;
        $tenant->floor          = $request->floor;
        $tenant->business_name  = $request->business_name;
        $tenant->name           = $request->name;
        $tenant->cnic           = $request->cnic;
        $tenant->mobile         = $request->mobile;
        $tenant->area           = $request->area;
        $tenant->monthly_rent   = $request->monthly_rent;
        $tenant->home_address   = $request->home_address;
        $tenant->details        = $request->details;
        $tenant->added_by       = auth()->user()->id;
        $tenant->rate           = $request->rate;
        $tenant->start_date       = $request->start_date;
        $tenant->revision_date    = $request->revision_date;
        $tenant->expiry_date      = $request->expiry_date;
        $tenant->office_type      = $request->office_type;
        $tenant->service_charges  = $request->service_charges;
        $tenant->is_active        = $request->is_active;
        $tenant->save();
        return redirect()->route('admin.tenants.index')->with('message', 'New Tenant Updated');
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
