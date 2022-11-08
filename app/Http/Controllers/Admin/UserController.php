<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('users', 'roles'));
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
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            $user->syncRoles($request->role_id);
            return redirect()->back()->with('message', 'Record Updated');
        }
        return redirect()->back()->with('error', 'There is some technical issue');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return "Profile Page";
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.users.edit', compact('user', 'roles'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required',
        ]);
        // $role = Role::where('id', $request->role_id)->first();
        $user = User::find($id);
        if ($request->name) {
            $user->name     = $request->name;
        }
        if ($request->email) {
            $user->email    = $request->email;
        }
        if ($request->password) {
            $user->password = $request->password ? bcrypt($request->password) : $user->password;
        }
        $user->save();
        $user->syncRoles($request->role_id);
        return redirect()->route('admin.users.index')->with('message', 'Record Updated');
    }

    public function loginAs(Request $request, $id)
    {
        $request->session()->put('admin_id', Auth::user()->id);
        $user = User::find($id);
        //ore use your own way to get the user
        Auth::login($user);
        return redirect()->route('admin.home');
    }

    public function loginBack(Request $request)
    {
        $admin_id = $request->session()->get('admin_id');
        $user = User::where('id', $admin_id)->first();
        //ore use your own way to get the user
        Auth::login($user);
        $request->session()->forget('admin_id');
        return redirect()->route('admin.home');
    }

    public function password()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('admin.users.password', compact('user'));
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        if ($request->new_password) {
            $user->password = $request->new_password ? bcrypt($request->new_password) : $user->new_password;
        }
        $user->save();

        return redirect()->route('admin.home')->with('message', 'Password Updated');
    }
}
