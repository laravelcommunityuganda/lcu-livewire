<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LcuJobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Public routes
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/about', [HomeController::class, 'about'])
    ->name('about');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    //Admin Routes
    Route::prefix('admin')
        // ->middleware(['can:admin'])
        ->group(function () {

            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::resource('users', UserController::class)
                ->names(['create' => 'admin.users.create', 'index' => 'admin.users.index', 'edit' => 'admin.users.edit', 'store' => 'admin.users.store']);

            Route::resource('events', EventController::class)
                ->names(['create' => 'admin.events.create', 'index' => 'admin.events.index', 'edit' => 'admin.events.edit', 'store' => 'admin.events.store']);


            Route::resource('resources', ResourceController::class)
                ->names(['create' => 'admin.resources.create', 'index' => 'admin.resources.index', 'edit' => 'admin.resources.edit', 'store' => 'admin.resources.store']);

            Route::resource('jobs', LcuJobController::class)
                ->names(['create' => 'admin.jobs.create', 'index' => 'admin.jobs.index', 'edit' => 'admin.jobs.edit', 'store' => 'admin.jobs.store']);

            Route::resource('forum', ForumController::class)
                ->names(['create' => 'admin.forum.create', 'index' => 'admin.forum.index', 'edit' => 'admin.forum.edit', 'store' => 'admin.forum.store']);

            Route::resource('posts', PostController::class)
                ->names(['create' => 'admin.posts.create', 'index' => 'admin.posts.index', 'edit' => 'admin.posts.edit', 'store' => 'admin.posts.store']);
        });
    // Post
    Route::resource('posts', PostController::class)
        ->except(['index', 'show']);


    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

});

// Events
Route::resource('events', EventController::class)->only(['index', 'show']);

Route::post('/events/{event}/register', [EventController::class, 'register'])
    ->middleware(['auth', 'verified'])
    ->name('events.register');
Route::post('/events/{event}/cancel', [EventController::class, 'cancelRegistration'])
    ->middleware(['auth', 'verified'])
    ->name('events.cancel');

// Resources
Route::resource('resources', ResourceController::class)
    ->only(['index', 'show']);

Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])
    ->name('resources.download');

// Jobs
Route::resource('jobs', LcuJobController::class)
    ->only(['index', 'show']);

//Posts

Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

//Forum
Route::resource('forum', ForumController::class)
    ->only(['index', 'show']);

// Forum threads
Route::resource('forum.threads', ForumController::class)
    ->only(['index', 'show']);

Route::get('/threads/{thread}', [ThreadController::class, 'show'])
    ->name('threads.show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
