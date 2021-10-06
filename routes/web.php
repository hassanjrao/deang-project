<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

// Example Routes


Auth::routes();

Route::view('/', 'landing');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

});

Route::middleware(["auth", "role:admin"])->prefix('admin')->name("admin.")->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


    Route::get("/profile",[ProfileController::class, "index"])->name("profile.index");
    Route::put("/profile/updateUser/{id}",[ProfileController::class, "updateUser"])->name("profile.updateUser");
    Route::post("/profile/updatePassword/{id}",[ProfileController::class, "updatePassword"])->name("profile.updatePassword");

    Route::resource('users', UserController::class);

});
