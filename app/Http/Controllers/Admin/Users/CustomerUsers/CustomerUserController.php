<?php

namespace App\Http\Controllers\Admin\Users\CustomerUsers;

use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Requests\Admin\Users\CustomerUserRequest;
use App\Models\Users\CustomerUser;
use Illuminate\Support\Facades\Hash;

class CustomerUserController extends UserController
{
    public function index()
    {
        $customerUsers = CustomerUser::where('user_type',0)->orderBy('created_at','asc')->get();
        return view('admin.users.customer-users.index',compact('customerUsers'));
    }

    public function create()
    {
        return view('admin.users.customer-users.create');
    }

    public function store(CustomerUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);
        $adminUser = CustomerUser::create($inputs);
        return redirect()->route('customer_user.index')->with('toast-success','کاربر با موفقیت ساخته شد');
    }

    public function destroy(CustomerUser $customerUser)
    {
        $result = $customerUser->delete();
        return redirect()->route('customer_user.index');
    }
}
