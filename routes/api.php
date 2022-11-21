<?php

use App\Http\Controllers\NurseController;
use App\Http\Controllers\PassportController;
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


Route::post('login', [PassportController::class, 'login']);

Route::get('login-list', [PassportController::class, 'userList']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('register', [PassportController::class, 'register']);
    Route::post('logout', [PassportController::class, 'logout']);
    Route::post('nurse-doc', [NurseController::class, 'tabCreateOrUpdate']);

    Route::get('nurse-doc/{id}', [NurseController::class, 'getNurseDoc']);
    Route::get('all-nurse', [NurseController::class, 'getAllNurse']);
});
