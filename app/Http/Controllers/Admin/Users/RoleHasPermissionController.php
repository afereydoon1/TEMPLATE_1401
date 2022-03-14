<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionController extends Controller
{
    public function create(Role $role)
    {
        $permissions= Permission::all();
        return view('admin.users.role_has_permission.create',compact('role','permissions'));
    }

    public function givPermissionToRole(Request $request,Role $role)
    {
        $permission_id = $request->get('id');
        $permission = Permission::findById($permission_id);
        $hasPermission = $role->hasPermissionTo( $permission->id);
        if ($permission_id == $hasPermission)
        {
            $role->revokePermissionTo($permission->name);
            return response()->json(['status' => true,'checked'=>false]);
        }
        else
        {
            $role->givePermissionTo($permission->name);
            return response()->json(['status' => true,'checked'=>true]);
        }
    }

}
