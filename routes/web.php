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
    Route::get('myaccount/predictions/group-stage', [App\Http\Controllers\Web\WebController::class, 'predictions16'])->name('predictions.16');
    Route::get('myaccount/predictions/round-of-16', [App\Http\Controllers\Web\WebController::class, 'predictions8'])->name('predictions.8');
    Route::get('myaccount/predictions/quarter-finals', [App\Http\Controllers\Web\WebController::class, 'predictions4'])->name('predictions.4');
    Route::get('myaccount/predictions/semifinals', [App\Http\Controllers\Web\WebController::class, 'predictions2'])->name('predictions.2');
    Route::get('myaccount/predictions/final', [App\Http\Controllers\Web\WebController::class, 'predictions1'])->name('predictions.1');
    Route::post('saveMyPrediction', [App\Http\Controllers\Web\ProfileController::class, 'saveMyPrediction'])->name('saveMyPrediction');
    Route::get('myaccount/dynamics', [App\Http\Controllers\Web\WebController::class, 'dynamics'])->name('dynamics');
    Route::get('myaccount/dynamic/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'dynamic'])->name('dynamic');
    Route::post('saveDynamic', [App\Http\Controllers\Web\ProfileController::class, 'saveDynamic'])->name('saveDynamic');
});

Route::get('/', [App\Http\Controllers\Web\WebController::class, 'index'])->name('index');
Route::get('resultados-partidos/fase-de-grupos', [App\Http\Controllers\Web\WebController::class, 'games_result16'])->name('games_result.16');
Route::get('resultados-partidos/octavos-de-final', [App\Http\Controllers\Web\WebController::class, 'games_result8'])->name('games_result.8');
Route::get('resultados-partidos/cuartos-de-final', [App\Http\Controllers\Web\WebController::class, 'games_result4'])->name('games_result.4');
Route::get('resultados-partidos/semifinales', [App\Http\Controllers\Web\WebController::class, 'games_result2'])->name('games_result.2');
Route::get('resultados-partidos/final', [App\Http\Controllers\Web\WebController::class, 'games_result1'])->name('games_result.1');
Route::get('terminos-y-condiciones', [App\Http\Controllers\Web\WebController::class, 'terms'])->name('terms');
Route::get('politica-de-privacidad', [App\Http\Controllers\Web\WebController::class, 'policy'])->name('policy');
Route::get('curiosidades', [App\Http\Controllers\Web\WebController::class, 'blog'])->name('blog');
Route::get('curiosidades/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'post'])->name('post');

/****** File Manager ******/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get("storage-link", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});