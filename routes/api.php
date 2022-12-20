<?php

use App\Http\Controllers\NurseController;
use App\Http\Controllers\PassportController;
use \App\Http\Controllers\UserController;
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
    Route::post('doc-finish', [NurseController::class, 'finish']);
    Route::post('nurse-doc', [NurseController::class, 'tabCreateOrUpdate']);
    Route::post('register', [PassportController::class, 'register']);
    Route::post('logout', [PassportController::class, 'logout']);
    Route::post('refresh-token', [PassportController::class, 'refreshToken']);

    Route::get('nurse-doc/{id}', [NurseController::class, 'getNurseDoc']);
    Route::get('all-nurse', [NurseController::class, 'getAllNurse']);

    Route::prefix('user')->controller(UserController::class)->group(function(){
        Route::post('update','update');
        Route::post('block','block');
        Route::post('delete','delete');
        Route::get('list','userList');

    });
});
