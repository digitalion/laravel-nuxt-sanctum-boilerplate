<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
	Route::post('login', 'AuthController@login');
	Route::middleware(['auth:sanctum'])->group(function () {
		Route::get('profile', 'AuthController@profile');
		Route::get('logout', 'AuthController@logout');
	});
});

Route::middleware(['auth:sanctum', 'can:' . PermissionEnum::PanelAdmin])->group(function () {
	Route::apiResource('users', UserController::class)->except(['edit', 'create', 'store', 'update']);
	Route::post('users', [UserController::class, 'store']);
	Route::put('users/{user}', [UserController::class, 'update']);
	Route::post('users/{user}', [UserController::class, 'update']);
	Route::patch('users/{user}', [UserController::class, 'update']);

	Route::apiResource('roles', RoleController::class)->except(['create', 'edit']);
	Route::apiResource('users.roles', UserRoleController::class)->except(['create', 'edit', 'show', 'update']);
});
