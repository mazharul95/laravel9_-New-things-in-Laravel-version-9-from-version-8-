<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Psy\Util\Str;

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

// Route::get('/', function () {
//    //laravel 8 str helper function 
//     return str::of('hello world')->append(' and everyone else');
//    //laravel 9 str helper function
//    return str('hello world');
//     //return view('welcome');
// });

Route::get('/', function(){
    return view('welcome');
})->name('home');

Route::get('/endpoint', function(){
    //laravel 9 new helper function to_route 
    //to_route that will return a redirect response;
    return to_route('home');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts','index');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts', 'store');

});

 
