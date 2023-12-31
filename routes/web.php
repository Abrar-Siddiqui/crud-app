<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('Home Page');
    Route::get('create','create')->name('register');
    Route::post('product/store','store')->name('Stordata');
    Route::get('edit/{id}','edit')->name('ProductEdit');
    Route::put('product/{id}','Update')->name('UpdateProgram');
    Route::get('delete/{id}','destroy')->name('DeleteProgram');
});
