<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Blade;
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

Route::get('/', function(){
    return view('welcome');
})->name('home');

//New Helper Functions

// Route::get('/', function () {
//    //laravel 8 str helper function 
//     return str::of('hello world')->append(' and everyone else');
//    //laravel 9 str helper function
//    return str('hello world');
//     //return view('welcome');
// });

Route::get('/endpoint', function(){
    //laravel 9 new helper function to_route 
    //to_route that will return a redirect response;
    return to_route('home');
});
            //End New Helper Functions//

//laravel 9 - Controller Route Groups
// Route::controller(PostController::class)->group(function () {
//     Route::get('/posts','index');
//     Route::get('/posts/{post}', 'show');
//     Route::post('/posts', 'store');

// });
// //laravel9 - Refreshed Ignition Error Page
// Route::get('/', function(){
//     throw new \Exception('whoops');

//     return view('welcome');
// });

Route::get('/', function(){
//laravel9 - Render a Blade String
        return Blade::render('{{ $greeting }}, World', ['greeting' => 'Hello']);
         return view('welcome');
     });

     //laravel9 - Forced Scoped Bindings
route::get('/users/{user}/posts/{post}', function(User $user, Post $post) {
    return $post;
})->scopeBindings();     



Route::get('/', function(){
    return Post::search('occaecati')->paginate();
});     
 