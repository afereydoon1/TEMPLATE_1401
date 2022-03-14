<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Users\AdminUsers\AdminUserController;
use App\Http\Controllers\Admin\Users\CustomerUsers\CustomerUserController;
use App\Http\Controllers\Admin\Users\PermissionsController;
use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\RoleHasPermissionController;
use App\Http\Controllers\Admin\Users\ModelHasRoleController;
use App\Http\Controllers\Admin\Users\ModelHasPermissionController;

Route::prefix('admin')->group(function () {
    //admin-dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //users
    Route::prefix('users')->group(function () {
        //admin_user
        Route::get('admin_user/status/{user}', [AdminUserController::class, 'status'])->name('admin_user.status');
        Route::resource('admin_user', AdminUserController::class);

        //roles
        Route::get('roles/status/{role}', [RoleController::class, 'status'])->name('roles.status');
        Route::resource('roles', RoleController::class)->except('show');

        //permissions
        Route::get('permissions/status/{permission}', [PermissionsController::class, 'status'])->name('permissions.status');
        Route::resource('permissions', PermissionsController::class)->except('show');

        //role_has_permission
        Route::get('role_has_permission/createPermissionToRole/{role}', [RoleHasPermissionController::class, 'create'])->name('role_has_permission.create');
        Route::get('role_has_permission/givPermissionToRole/{role}', [RoleHasPermissionController::class, 'givPermissionToRole'])->name('role_has_permission.givPermissionToRole');

        //model_has_role
        Route::get('model_has_role/giveRole/{user}', [ModelHasRoleController::class, 'create'])->name('model_has_role.create');
        Route::get('model_has_role/givRoleToAdmin/{user}', [ModelHasRoleController::class, 'givRoleToAdmin'])->name('model_has_role.givRoleToAdmin');

        //model_has_permission
        Route::get('model_has_permission/createPermissionToAdmin/{user}', [ModelHasPermissionController::class, 'create'])->name('model_has_permission.create');
        Route::get('model_has_permission/givPermissionToAdmin/{user}', [ModelHasPermissionController::class, 'givPermissionToAdmin'])->name('model_has_permission.givPermissionToAdmin');

        //customer_user
        Route::get('customer_user/status/{user}', [CustomerUserController::class, 'status'])->name('customer_user.status');
        Route::resource('customer_user', CustomerUserController::class)->except(['edit','update']);


    });

});
