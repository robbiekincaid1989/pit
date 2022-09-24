<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsPostCategoryController;
use App\Http\Controllers\NewsPostController;
use App\Models\NewsPost;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function() {
        return view('auth.login');
    })->name('auth.login');

Route::get('/register', function() {
        return view('auth.register');
    })->name('auth.register');

Route::group(['middleware' => ['auth']], function() {
    // Display the dashboard to logged in users
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Only admins can create, edit, and delete categories
    Route::resource('categories', NewsPostCategoryController::class)
    ->middleware('is_admin');

    // Only admins can create, edit, and delete news posts
    Route::resource('newsposts', NewsPostController::class)
    ->middleware('is_admin');
});

require __DIR__.'/auth.php';