<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
Route::middleware('auth.basic')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
Route::get('/posts', [ApiController::class, "getposts"]);
Route::get('/categories', [ApiController::class, "getcategories"]);
Route::get('/products', [ApiController::class, "getprocuts"]);
Route::get('/abouts', [ApiController::class, "getabout"]);
Route::get('/advantags', [ApiController::class, "getadvantag"]);
Route::get('/logos', [ApiController::class, "getlogo"]);
Route::get('/lacales/uz', [ApiController::class, "uz"]);
Route::get('/lacales/ru', [ApiController::class, "ru"]);
Route::get('/lacales/en', [ApiController::class, "en"]);
});
