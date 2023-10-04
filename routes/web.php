<?php

use Illuminate\Support\Facades\Route;
use Riasad\Rolemanager\Http\Controllers\PermissionsController;
use Riasad\Rolemanager\Http\Controllers\RolesController;
use Riasad\Rolemanager\Http\Controllers\UsersController;

Route::middleware(['auth','web','superadmin'])->prefix('rolemanager')->name('rolemanager.')->group(function(){
    Route::resource('permissions',PermissionsController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('users',UsersController::class);
});
