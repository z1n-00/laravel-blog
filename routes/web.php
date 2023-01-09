<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Article\CommentController;
use App\Models\Users;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

/*
//Static Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', function () {
    return "Article List";
});

Route::get('/articles/detail', function () {
    return "Article Detail";
});


//Dynamic Route
//{id} =Route parameter
Route::get('/articles/detail/{id}', function ($id) {
    return "Articles Detail - $id";
});


// Route Names
Route::get('/articles/detail', function () {
    return "Article Detail";
})->name('article.detail');

Route::get('/articles/more', function () {
    return redirect()->route('article.detail');
});
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//Connection bet: Route & Controllelr
Route::get('/', [ArticleController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'upload'])->name('profile.upload');

//For add new Article
Route::get('/articles/add', [ArticleController::class, 'add']);

//For HTML form submit
Route::post('/articles/add', [ArticleController::class, 'create']);

//For delete Article
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

// For add new Comment 
Route::post('/comments/add', [CommentController::class, 'create']);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);

Route::put('/articles/edit/{id}', [ArticleController::class, 'update']);

// For delete Comment 
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
