<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Models\Post;

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
//      return view('welcome');
//  });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'])->name('list_posts');

Route::group(['prefix' => 'posts'], function(){
    
    Route::get('/drafts', [PostController::class, 'drafts'])
    ->name('list_drafts')
    ->middleware('auth');

    Route::get('/show/{id}', [PostController::class, 'show'])
    ->name('show_post');

    Route::get('/create', [PostController::class, 'create'])
    ->name('create_post')
    ->middleware('can:create-post');

    Route::post('/create', [PostController::class, 'store'])
    ->name('store_post')
    ->middleware('can:create-post');

    Route::get('/edit/{post}', [PostController::class, 'edit'])
    ->name('edit_post')
    ->middleware('can:update-post, post');

    Route::post('/edit/{post}', [PostController::class, 'update'])
    ->name('update_post')
    ->middleware('can:update-post, post');

    Route::get('/publish/{post}', [PostController::class, 'publish'])
    ->name('publish_post')
    ->middleware('can:publish-post');

});

