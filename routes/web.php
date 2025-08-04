<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\HomepageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth_login'])->name('auth_login');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin/'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'menus/'], function () {
            Route::get('', [MenuController::class, 'index'])->name('menus.index');
            Route::post('', [MenuController::class, 'store'])->name('menus.store');
            Route::get('{menu}', [MenuController::class, 'show'])->name('menus.show');
            Route::put('{menu}', [MenuController::class, 'update'])->name('menus.update');
            Route::delete('{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
            Route::get('order', [MenuController::class, 'order'])->name('menus.order');
            Route::post('reorder', [MenuController::class, 'reorder'])->name('menus.reorder');
        });

        Route::group(['prefix' => 'roles/'], function () {
            Route::get('', [RoleController::class, 'index'])->name('roles.index');
            Route::post('', [RoleController::class, 'store'])->name('roles.store');
            Route::get('{role}', [RoleController::class, 'show'])->name('roles.show');
            Route::put('{role}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::group(['prefix' => 'permissions/'], function () {
            Route::get('', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('generator', [PermissionController::class, 'generate'])->name('permissions.generate');
            Route::put('{permission}', [PermissionController::class, 'update'])->name('permissions.update');
            Route::delete('{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        });

        Route::group(['prefix' => 'users/'], function () {
            Route::get('', [UserController::class, 'index'])->name('users.index');
            Route::post('', [UserController::class, 'storeOrUpdate'])->name('users.store');
            Route::put('{id}', [UserController::class, 'storeOrUpdate'])->name('users.update');
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
            Route::post('profile/update', [UserController::class, 'updateProfile'])->name('users.updateProfile');
        });

        Route::group(['prefix' => 'profile/'], function () {
            Route::get('', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('', [ProfileController::class, 'update'])->name('profile.update');
        });

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
