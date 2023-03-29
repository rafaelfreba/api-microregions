<?php

use App\Http\Controllers\MobileLoginController;
use App\Http\Controllers\CountyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('counties/microregions', [CountyController::class, 'microregions']);
    Route::get('counties/macroregions', [CountyController::class, 'macroregions']);
    Route::get('counties/poleMunicipalities', [CountyController::class, 'poleMunicipalities']);
    Route::get('counties', [CountyController::class, 'index']);
    Route::get('counties/{county}', [CountyController::class, 'show']);
});

Route::post('/mobile/login', [MobileLoginController::class, 'login'])->name('mobile.login');
