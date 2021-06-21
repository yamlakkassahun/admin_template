<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Api\MobileController;
use App\Http\Controllers\teretController;
use App\Http\Controllers\SubscriberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function (){
    return redirect('/admin');
});


Route::middleware('auth')->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/category', CategoryController::class );
    Route::resource('/employee', AccountController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/log', LogController::class);
    Route::get('/postlog/{id}', [LogController::class, 'postLogShow']);
    Route::get('/employeelog/{id}',[LogController::class, 'employeeLogShow']);
    Route::post('/category/search', [CategoryController::class, 'search'])->name('categorysearch');
    Route::post('/category/upload', [CategoryController::class, 'upload']);
    Route::post('/employee/search', [AccountController::class, 'search'])->name('employeesearch');
    Route::post('/employee/upload', [AccountController::class, 'upload']);
    Route::post('/profile/upload', [ProfileController::class, 'upload']);
    Route::post('/posts/upload', [PostController::class, 'upload']);
    Route::post('/post/search', [PostController::class, 'search'])->name('postsearch');
    Route::post('/admin/search', [AdminController::class, 'search'])->name('search');;
});



Auth::routes();
