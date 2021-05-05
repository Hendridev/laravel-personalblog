<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
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

// homepage
Route::get('/', function () {
    return view('layouts.app');
});
// allpost
Route::get('/posts', [postController::class, 'allPost'])->name('posts');

// Form post
Route::get('/posts/create', [postController::class, 'createPost'])->name('createPost');
// move post to db
Route::post('/posts/store', [postController::class, 'storePost'])->name('storePost');

// edit post
Route::get('/posts/{post:slug}/edit', [postController::class, 'editPost'])->name('editPost');
Route::patch('/posts/{post:slug}/edit', [postController::class, 'updatePost'])->name('updatePost');

Route::delete('/posts/{post:slug}/delete', [postController::class, 'deletePost'])->name('deletePost');

// category & tags form
Route::get('/tags/create', [TagController::class, 'createTags'])->name('createTags');
Route::post('/tags/store', [TagController::class, 'storeTags'])->name('storeTags');

Route::get('/categories/create', [categoryController::class, 'createCat'])->name('createCat');
Route::post('/categories/store', [categoryController::class, 'storeCat'])->name('storeCat');

// category & tags page
Route::get('/categories',[categoryController::class, 'pageCategory'])->name('pageCategory');
Route::get('/tags',[TagController::class, 'pageTags'])->name('pageTags');

// category & tags session
Route::get('/categories/{category:slug}', [categoryController::class, 'allCategory'])->name('allCategory');
Route::get('/tags/{tag:slug}', [TagController::class, 'allTags'])->name('allTags');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// postslug
Route::get('/posts/{post:slug}', [postController::class, 'allSlug'])->name('slug');
Route::get('/admin', function(){
    return view('auth.login');
});