<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\NewsController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_user')->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('news', NewsController::class);

    Route::resource('events', EventsController::class);

});

Route::get('/', function() {
    // return bcrypt(123);
    return view('welcome');
})->name('website');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
