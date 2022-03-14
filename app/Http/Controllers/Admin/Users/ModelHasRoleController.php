<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModelHasRoleController extends Controller
{
    public function create(User $user)
    {
        $roles = Role::all();
        return view('admin.users.model_has_role.create',compact('user','roles'));
    }

    public function givRoleToAdmin(Request $request,User $user)
    {
        $role_id = $request->get('id');
        $role = Role::findById($role_id);
        $hasRole = $user->hasRole($role->id);
        if ($role_id == $hasRole)
        {
            $user->removeRole($role->name);
            return response()->json(['status' => true,'checked'=>false]);
        }
        else
        {
            $user->assignRole($role->name);
            return response()->json(['status' => true,'checked'=>true]);
        }
    }


}
