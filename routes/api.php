<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\PriceEsctimateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user', [AuthContoller::class, "store"]);
Route::put('/updateUser/{user}', [AuthContoller::class, "update"]);
Route::delete('/deleteUser/{user}', [AuthContoller::class, "destroy"]);

Route::post("/price", [PriceEsctimateController::class, "index"]);
Route::post('login', 'App\Http\Controllers\AuthContoller@login');


// Route::group(
//     [
//         'middleware' => 'api',
//         'prefix' => 'auth'
//     ],
//     function ($router) {
//         Route::post('logout', 'AuthController@logout');
//         Route::post('refresh', 'AuthController@refresh');
//         Route::post('me', 'AuthController@me');
//     }
// );
