<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PostController;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('', fn() => redirect('admin/dashboard'));

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // posts routes
    Route::resource('/posts', PostController::class)->name('*', 'post');

    // categories routes
    Route::resource('/category', CategoryController::class)->name('*', 'category');

    Route::resource('/contact', AddressController::class)->name('*', 'contact');

    Route::resource('/users', RegisteredUserController::class)->middleware('guest')->name('*', 'users');

    Route::resource('/about', AboutController::class)->name('*', 'about');

    Route::resource('/link', LinkController::class)->name('*', 'link');

});

// visitor's routes

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/actualités', [PostController::class, 'index']);

Route::get('/actualité/{slug}', [PostController::class, 'show']);

Route::get('/contacts', [ContactController::class, 'index']);

Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/galerie', function () {
    return view('pages.gallery');
});

Route::group(['prefix' => 'a-propos'], function () {
    Route::get('qui-sommes-nous', function () {
        return view('pages.about.who-are-we');
    });

    Route::get('rayon-activité', function () {
        return view('pages.about.activity-range');
    });

    Route::get('notre-vision', function () {
        return view('pages.about.our-vision');
    });

    Route::get('motivation-de-creation', function () {
        return view('pages.about.activity-range');
    });
});

require __DIR__ . '/auth.php';
