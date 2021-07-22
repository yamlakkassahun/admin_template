<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MobileController;
use App\Http\Controllers\SubscriberController;

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

Route::post('/subscriber',[SubscriberController::class,'subscriberloginApi']);
Route::post('/subscriber/check',[SubscriberController::class,'subscriberloginApiCheck']);
Route::get('/recipes',[MobileController::class,'allRecipes']);
Route::get('/latest/recipes',[MobileController::class,'latestRecipes']);
Route::get('/recipe/{id}',[MobileController::class,'singleRecipe']);
Route::get('/latest/categories',[MobileController::class,'latestCategories']);
Route::get('/categories',[MobileController::class,'allCategories']);
Route::get('/category/{id}',[MobileController::class,'singleCategory']);

