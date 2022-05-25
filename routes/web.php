<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, 'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/product',[AdminController::class,'product'])->name('product');

Route::get('/showproduct',[AdminController::class,'showproduct'])->name('showproduct');

Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct'])->name('deleteproduct');

Route::get('/updateview/{id}',[AdminController::class,'updateview'])->name('updateview');

Route::post('/updateproduct/{id}',[AdminController::class,'updateproduct'])->name('updateproduct');

Route::get('/search',[HomeController::class,'search'])->name('search');

Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart');

Route::get('/showcart',[HomeController::class,'showcart'])->name('showcart');

Route::get('/delete/{id}',[HomeController::class,'deletecart'])->name('delete');

Route::post('/order',[HomeController::class,'confirmorder'])->name('order');

Route::get('/showorder',[AdminController::class,'showorder'])->name('showorder');

Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus'])->name('updatestatus');








Route::post('/uploadproduct',[AdminController::class,'uploadproduct'])->name('uploadproduct');



