<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at','desc')->simplePaginate(10);
        return view('admin.users.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.users.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $inputs = $request->all();
        $postCategory = Role::create($inputs);
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.users.roles.edit',compact('role'));
    }

    public function update(RoleRequest $request,Role $role)
    {
        $inputs = $request->all();
        $role->update($inputs);
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $result = $role->delete();
        return redirect()->route('roles.index');
    }

    public function status(Role $role)
    {
        $role->status = $role->status == 0 ? 1 : 0;
        $result = $role->save();
        if ($result)
        {
            if ($role->status == 0)
            {
                return response()->json(['status' => true,'checked'=>false]);
            }
            else
            {
                return response()->json(['status' => true,'checked'=>true]);
            }
        }
        else
        {
            return response()->json(['status' => false]);
        }
    }



}
