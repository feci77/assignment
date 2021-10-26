<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/test',function(){
    return view('welcome');
});

Route::get('dd',function () {
    print_r(env('SHOPIFY_PRODUCT_CREATE_URL'));exit;
});
Route::get('/book-details/{id?}',function(){
    return view('welcome');
});

Route::get('books', 'App\Http\Controllers\Api\BookController@index' );
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
