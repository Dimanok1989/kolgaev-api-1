<?php

use App\Http\Controllers\Users\Authorization;
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

Route::group(['prefix' => "user"], function () {

    Route::middleware('auth:sanctum')->get('/', function (Request $request) {
        return $request->user();
    })->name('api.user');

    Route::post('login', [Authorization::class, 'login'])->name('api.user.login');
    Route::middleware('auth:sanctum')->get('logout', [Authorization::class, 'logout'])->name('api.user.logout');
});
