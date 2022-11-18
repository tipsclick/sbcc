<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\TenantFile;
use Illuminate\Http\Request;
use Image;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::orderBy('floor', 'asc')->get()->groupBy('floor');
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
        $tenant->office_no      = $request->office_no ? $request->office_no : 0;
        $tenant->floor          = $request->floor ? $request->floor : null ;
        $tenant->business_name  = $request->business_name;
        $tenant->name           = $request->name;
        $tenant->cnic           = $request->cnic ? $request->cnic : null;
        $tenant->mobile         = $request->mobile ? $request->mobile : null;
        $tenant->area           = $request->area ? $request->area : 0;
        $tenant->monthly_rent   = $request->monthly_rent ? $request->monthly_rent : 0;
        $tenant->home_address   = $request->home_address;
        $tenant->details        = $request->details;
        $tenant->added_by       = auth()->user()->id;
        $tenant->rate           = $request->rate ? $request->rate : 0;
        $tenant->start_date       = $request->start_date;
        $tenant->revision_date    = $request->revision_date;
        $tenant->expiry_date      = $request->expiry_date;
        $tenant->office_type      = $request->office_type;
        $tenant->service_charges  = $request->service_charges ? $request->service_charges : 0;
        $tenant->is_active        = 1;
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

    public function files($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        $deleted = TenantFile::where('tenant_id', $id)->onlyTrashed()->get();
        return view('admin.tenants.file', compact('tenant', 'deleted'));
    }
    
    public function filesSave(Request $request, $id)
    {
        $request->validate([
            'image'      => 'mimes:jpeg,png,jpg,pdf|max:2048'
        ]);

        $tenant             = new TenantFile;
        // Upload Document
        if ($request->hasFile('image')) {
            if ($request->hasFile('image') && $request->image->isValid()) {
                $image = $request->file('image');
                $filename = $id . "_" . date('d-m-Y') . "_" . time() . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath())->widen(1000);
                $upload = $image_resize->save('uploads/tenant/' . $filename);
                if ($upload) {
                    $tenant->image      = $filename ? $filename : null;
                }
            }
        }
        
        $tenant->tenant_id  = $id;
        $tenant->type       = $request->type;
        $tenant->file_date  = $request->file_date;
        $tenant->is_active  = $request->is_active ? $request->is_active : 0;
        $tenant->added_by       = auth()->user()->id;
        $tenant->save();

        return redirect()->back()->with('message', 'New Document Updated');
    }

    public function filesDelete($id, $fid)
    {
        TenantFile::where('id',$fid)->where('tenant_id',$id)->delete();
        return redirect()->back()->with('message', 'Document Deleted');
    }
}
