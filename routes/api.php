<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PassportController;
use App\Http\Controllers\ShopController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [PassportController::class, 'register']);
Route::post('login',    [PassportController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::post('logout',   [PassportController::class, 'logout']);

    Route::post('/shops', [ShopController::class, 'shops_create']);
    Route::get ('/shops', [ShopController::class, 'shops_list']);
    
    Route::post  ('/shops/{id}/pictures',    [ShopController::class, 'picture_create']);
    Route::get   ('/shops/{id}/pictures',    [ShopController::class, 'picture_list']);

    Route::group(['middleware' => ['permission:destroy_pictures']], function () {
        Route::delete('/shops/{id}/pictures',    [ShopController::class, 'picture_delete']);
    });

});

Route::get   ('pictures', [ShopController::class, 'index' ])->name('pictures.index');
Route::post  ('pictures', [ShopController::class, 'store' ])->name('pictures.store');
Route::delete('pictures/{picture}', [ShopController::class, 'delete'])->name('pictures.delete');
