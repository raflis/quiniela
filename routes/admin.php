<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin');
    Route::resource('pagefields', App\Http\Controllers\Admin\PageFieldController::class)->only(['update']);
    Route::get('pagefields/configuration', [App\Http\Controllers\Admin\PageFieldController::class, 'configuration'])->name('pagefields.configuration');
    Route::get('pagefields/terms', [App\Http\Controllers\Admin\PageFieldController::class, 'terms'])->name('pagefields.terms');
    Route::get('pagefields/policy', [App\Http\Controllers\Admin\PageFieldController::class, 'policy'])->name('pagefields.policy');
    Route::resource('games', App\Http\Controllers\Admin\GameController::class);
    Route::resource('games_final', App\Http\Controllers\Admin\GameFinalController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('game_dynamics', App\Http\Controllers\Admin\GameDynamicController::class);
    Route::resource('game_dynamic_users', App\Http\Controllers\Admin\GameDynamicUserController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
