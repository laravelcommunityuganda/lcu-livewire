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

            Route::get('/', \App\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard');

            // Users
            Route::get('/users', \App\Livewire\Admin\Users\Index::class)->name('admin.users.index');
            Route::get('/users/create', \App\Livewire\Admin\Users\Form::class)->name('admin.users.create');
            Route::get('/users/{user}/edit', \App\Livewire\Admin\Users\Form::class)->name('admin.users.edit');
            Route::get('/users/{user}', \App\Livewire\Admin\Users\Show::class)->name('admin.users.show');

            // // Events
            Route::get('/events', \App\Livewire\Admin\Events\Index::class)->name('admin.events.index');
            Route::get('/events/create', \App\Livewire\Admin\Events\Form::class)->name('admin.events.create');
            Route::get('/events/{event}/edit', \App\Livewire\Admin\Events\Form::class)->name('admin.events.edit');

            // // Forums
            Route::get('/forums', \App\Livewire\Admin\Forums\Index::class)->name('admin.forums.index');
            Route::get('/forums/create', \App\Livewire\Admin\Forums\Form::class)->name('admin.forums.create');
            Route::get('/forums/{forum}/edit', \App\Livewire\Admin\Forums\Form::class)->name('admin.forums.edit');

            // // Posts
            Route::get('/posts', \App\Livewire\Admin\Posts\Index::class)->name('admin.posts.index');
            Route::get('/posts/create', \App\Livewire\Admin\Posts\Form::class)->name('admin.posts.create');
            Route::get('/posts/{post}/edit', \App\Livewire\Admin\Posts\Form::class)->name('admin.posts.edit');
            Route::get('/posts/{post}', \App\Livewire\Admin\Posts\Show::class)->name('admin.posts.show');

            // // Categories
            Route::get('/categories', \App\Livewire\Admin\Categories\Index::class)->name('admin.categories.index');
            Route::get('/categories/create', \App\Livewire\Admin\Categories\Form::class)->name('admin.categories.create');
            Route::get('/categories/{category}/edit', \App\Livewire\Admin\Categories\Form::class)->name('admin.categories.edit');

            // Resourses
            Route::get('/resources', \App\Livewire\Admin\Resources\Index::class)->name('admin.resources.index');
            Route::get('/resources/create', \App\Livewire\Admin\Resources\Form::class)->name('admin.resources.create');
            Route::get('/resources/{resource}/edit', \App\Livewire\Admin\Resources\Form::class)->name('admin.resources.edit');
            Route::get('/resources/{resource}', \App\Livewire\Admin\Resources\Show::class)->name('admin.resources.show');

            // Jobs
            Route::get('/jobs', \App\Livewire\Admin\Jobs\Index::class)->name('admin.jobs.index');
            Route::get('/jobs/create', \App\Livewire\Admin\Jobs\Form::class)->name('admin.jobs.create');
            Route::get('/jobs/{job}/edit', \App\Livewire\Admin\Jobs\Form::class)->name('admin.jobs.edit');
            Route::get('/jobs/{job}', \App\Livewire\Admin\Jobs\Show::class)->name('admin.jobs.show');

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
