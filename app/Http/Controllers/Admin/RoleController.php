<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.roles.index', compact('roles'));
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
            'name' => 'required|max:255',
        ]);
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        // $role = new Role;
        // $role->name = $request->name;
        if ($role) {
            // if ($role->save()) {
            return redirect()->back()->with('message', 'Record Updated');
        }
        return redirect()->back()->with('error', 'There is some technical issue');
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->orderBy('name', 'asc')->first();
        $permissions = Permission::get();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        if ($role->save()) {
            $role->syncPermissions($request->permission_id);
            return redirect()->route('admin.roles.index')->with('message', 'Record Updated');
        }
        return redirect()->back()->with('error', 'There is some technical issue');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();
        return response()->json(['role' => $role], 200);
    }

    public function permissions()
    {
        // Permission::create(['name'=>'view services']);
        // Permission::create(['name'=>'view companies']);
        // Permission::create(['name'=>'view vendors']);
        // Permission::create(['name'=>'view projects']);
        // Permission::create(['name'=>'view invoices']);
        // Permission::create(['name'=>'view clients']);
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('admin.roles.permissions', compact('permissions'));
    }

    public function permissionsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $permission = Permission::create(['name' => $request->name]);
        if ($permission) {
            return redirect()->back()->with('message', 'Record Updated');
        }
        return redirect()->back()->with('error', 'There is some technical issue');
    }
    
}
