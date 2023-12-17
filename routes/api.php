<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchController;


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

Route::get('/search/{sentence}', [ResearchController::class, "search"]);

Route::get('/id', function(){
    return Http::get('http://localhost:8080/epd-project/webapi/myresource/it');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
