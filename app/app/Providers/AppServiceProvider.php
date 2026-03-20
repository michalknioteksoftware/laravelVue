<?php

namespace App\Providers;

use App\Events\ExampleEvent;
use App\Listeners\ExampleListener;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Post::class, PostPolicy::class);
        Event::listen(ExampleEvent::class, ExampleListener::class);
    }
}
