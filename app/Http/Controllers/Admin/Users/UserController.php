<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function status(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;
        $result = $user->save();
        if ($result)
        {
            if ($user->status == 0)
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
