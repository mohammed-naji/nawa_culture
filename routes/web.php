<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\WebsiteController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->middleware('auth', 'check_user')->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('news', NewsController::class);

    Route::resource('projects', ProjectController::class);
    Route::get('all-donations', [ProjectController::class, 'donations'])->name('projects.donations');

    Route::resource('events', EventsController::class);

    Route::get('all-events/enrollments', [EventsController::class, 'enrollments'])->name('events.enrollments');

});

Route::get('/', [WebsiteController::class, 'index'])->name('website.home');

Route::get('news/{id}', [WebsiteController::class, 'news'])->name('website.news');

Route::post('news/{id}/comments', [WebsiteController::class, 'comments'])->name('website.comments');

Route::get('events/{id}', [WebsiteController::class, 'events'])->name('website.events');

Route::post('events/{id}/enrolled', [WebsiteController::class, 'enrolled'])->name('website.enrolled');

Route::post('contact', [WebsiteController::class, 'contact'])->name('website.contact');

Route::get('projects/{id}', [WebsiteController::class, 'projects'])->name('website.projects');

Route::post('projects/{id}/donation', [WebsiteController::class, 'donation'])->name('website.donation');
