<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamplesController;
use App\Http\Middleware\ExampleMiddleware;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

// Vue playground (plain Vue components mounted via Vite)
Route::get('/vue-examples', function () {
    return view('vue-examples');
});

Route::get('/examples', [ExamplesController::class, 'index']);

// Routing + route-model binding + Eloquent
Route::get('/examples/posts', [ExamplesController::class, 'listPosts']);
Route::get('/examples/posts/{post}', [ExamplesController::class, 'showPost']);
Route::post('/examples/posts', [ExamplesController::class, 'storePost']);

// Request validation
Route::post('/examples/validate', [ExamplesController::class, 'validateExample']);

// Blade rendering
Route::get('/examples/blade-demo', [ExamplesController::class, 'bladeDemo']);

// Authorization (Gate/Policy) without auth login
Route::get('/examples/authorize/posts/{post}', [ExamplesController::class, 'authorizeExample']);

// Middleware demo
Route::get('/examples/middleware', [ExamplesController::class, 'middlewareExample'])
    ->middleware(ExampleMiddleware::class);

// Cache + logging + filesystem
Route::get('/examples/cache', [ExamplesController::class, 'cacheExample']);
Route::get('/examples/storage', [ExamplesController::class, 'storageExample']);
Route::get('/examples/logging', [ExamplesController::class, 'loggingExample']);

// Events + Jobs
Route::get('/examples/events', [ExamplesController::class, 'eventsExample']);
Route::get('/examples/jobs', [ExamplesController::class, 'jobsExample']);

// Notifications (database)
Route::post('/examples/notifications', [ExamplesController::class, 'notificationsExample']);
