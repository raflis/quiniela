<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin');
    Route::resource('pagefields', App\Http\Controllers\Admin\PageFieldController::class)->only(['update']);
    //Route::get('pagefields/configuration', [App\Http\Controllers\Admin\PageFieldController::class,'configuration'])->name('pagefields.configuration');
    Route::resource('games', App\Http\Controllers\Admin\GameController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
