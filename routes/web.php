<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AboutsController;
use App\Http\Controllers\Admin\AdvantagesConreoller;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Api\WordsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories',   CategoriesController::class);
    Route::resource('posts',   PostsController::class);
    Route::resource('products',   ProductsController::class);
    Route::resource('abouts',   AboutsController::class);
    Route::resource('advantags',   AdvantagesConreoller::class);
    Route::resource('logos',   LogoController::class);
    Route::resource('words',   WordsController::class);
    Route::post('/post-image-upload',[PostsController::class,'upload'])->name('upload');
    Route::post('/product-image-upload',[ProductsController::class,'uploade'])->name('uploade');
    Route::post('/abouts-image-upload',[AboutsController::class,'uploada'])->name('uploada');
    Route::post('/advantag-image-upload',[AdvantagesConreoller::class,'uploadad'])->name('uploadad');
    Route::post('/logo-image-upload',[PostsController::class,'uploadl'])->name('uploadl');
    Route::post('/words-image-upload',[PostsController::class,'word'])->name('word');
});
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profiless', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
