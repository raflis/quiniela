<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    //$exitCode = Artisan::call('config:clear');
    //$exitCode = Artisan::call('cache:clear');
    //$exitCode = Artisan::call('config:cache');
    return 'DONE';
});

Route::prefix('/myaccount')->group(function(){
    Route::get('forget-password', [App\Http\Controllers\Web\LoginController::class, 'getForget'])->name('login.forget');
    Route::post('forget-password', [App\Http\Controllers\Web\LoginController::class, 'postForget'])->name('login.forget');
    Route::get('reset-password/{token}', [App\Http\Controllers\Web\LoginController::class, 'getReset'])->name('login.reset');
    Route::post('reset-password', [App\Http\Controllers\Web\LoginController::class, 'postReset'])->name('login.reset');
    Route::post('loginPost', [App\Http\Controllers\Web\LoginController::class, 'login'])->name('login.login');
    Route::resource('login', App\Http\Controllers\Web\LoginController::class);
});

Route::group(['middleware' => ['auth'] ], function () {
    //Route::get('/dashboard', [AuthController::class,"dashboard"]);
    Route::get('logout', [App\Http\Controllers\Web\LoginController::class, 'logout'])->name('logout');
    Route::resource('myaccount/profile', App\Http\Controllers\Web\ProfileController::class);
    Route::get('myaccount/predictions', [App\Http\Controllers\Web\WebController::class, 'predictions'])->name('predictions');
    Route::post('saveMyPrediction', [App\Http\Controllers\Web\ProfileController::class, 'saveMyPrediction'])->name('saveMyPrediction');
});

Route::get('/', [App\Http\Controllers\Web\WebController::class, 'index'])->name('index');
Route::get('post/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'post'])->name('post');

/****** File Manager ******/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get("storage-link", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});