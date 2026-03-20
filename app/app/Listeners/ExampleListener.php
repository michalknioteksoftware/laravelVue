<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use Illuminate\Support\Facades\Cache;

class ExampleListener
{
    public function handle(ExampleEvent $event): void
    {
        Cache::put('example_event_ran', $event->message, now()->addMinutes(5));
    }
}

