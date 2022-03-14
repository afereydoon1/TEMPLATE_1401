<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ModelHasPermissionController extends Controller
{
    public function create(User $user)
    {
        $permissions = Permission::all();
        return view('admin.users.model_has_permission.create', compact('user', 'permissions'));
    }

    public function givPermissionToAdmin(Request $request, User $user)
    {
        $permission_id = $request->get('id');
        $permission = Permission::findById($permission_id);
        $hasPermission = $user->hasPermissionTo($permission->id);

        if ($permission_id == $hasPermission)
        {
            $user->revokePermissionTo($permission->name);
            return response()->json(['status' => true,'checked'=>false]);
        }
        else
        {
            $user->givePermissionTo($permission->name);
            return response()->json(['status' => true,'checked'=>true]);
        }
    }

}
