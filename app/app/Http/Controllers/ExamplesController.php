<?php

namespace App\Http\Controllers;

use App\Events\ExampleEvent;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ExampleJob;
use App\Models\Post;
use App\Models\User;
use App\Notifications\ExampleNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ExamplesController extends Controller
{
    public function index(): Response
    {
        return response()->view('examples.index');
    }

    public function listPosts(): Response
    {
        $posts = Post::with('user')->latest()->get();

        return response()->view('examples.posts', [
            'posts' => $posts,
        ]);
    }

    public function showPost(Post $post): Response
    {
        return response()->view('examples.posts', [
            'posts' => collect([$post])->values(),
            'singlePost' => $post,
        ]);
    }

    public function storePost(StorePostRequest $request): Response
    {
        $validated = $request->validated();
        $user = isset($validated['user_id'])
            ? User::findOrFail($validated['user_id'])
            : $this->getOrCreateDemoUser();

        $post = $user->posts()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        return response()->json([
            'created' => true,
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'user_id' => $post->user_id,
            ],
        ]);
    }

    public function validateExample(Request $request): Response
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
        ]);

        return response()->json([
            'validated' => true,
            'data' => $data,
        ]);
    }

    public function bladeDemo(): Response
    {
        return response()->view('examples.blade-demo', [
            'title' => 'Hello from Blade!',
            'items' => ['Routing', 'Validation', 'Eloquent', 'Caching'],
        ]);
    }

    public function authorizeExample(Request $request, Post $post): Response
    {
        // Default to the post owner so the authorization example succeeds out of the box.
        $userIdRaw = $request->query('user_id');
        $userId = $userIdRaw !== null && $userIdRaw !== '' ? (int) $userIdRaw : (int) $post->user_id;
        $user = User::findOrFail($userId);

        Gate::forUser($user)->authorize('update', $post);

        return response()->json([
            'authorized' => true,
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }

    public function middlewareExample(): Response
    {
        return response('Middleware enabled', 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    public function cacheExample(): Response
    {
        $value = Cache::remember('example_cache_key', 60, function () {
            return 'cached_at=' . now()->toIso8601String();
        });

        return response()->json([
            'cache_value' => $value,
        ]);
    }

    public function storageExample(): Response
    {
        $content = 'Stored by Laravel at ' . now()->toIso8601String();
        $path = 'examples/test-' . now()->timestamp . '.txt';
        Storage::disk('local')->put($path, $content);

        return response()->json([
            'stored' => true,
            'path' => Storage::disk('local')->path($path),
        ]);
    }

    public function loggingExample(): Response
    {
        Log::info('Laravel logging example', [
            'time' => now()->toIso8601String(),
            'request_ip' => request()->ip(),
        ]);

        return response()->json([
            'logged' => true,
        ]);
    }

    public function eventsExample(): Response
    {
        $message = 'event_message_' . now()->timestamp;
        event(new ExampleEvent($message));

        return response()->json([
            'event_dispatched' => true,
            'listener_cached_value' => Cache::get('example_event_ran'),
        ]);
    }

    public function jobsExample(): Response
    {
        $payload = 'job_payload_' . now()->timestamp;
        // Use direct handle execution to avoid queue/bus configuration hangs.
        // This still demonstrates the Job object's structure and handle() logic.
        (new ExampleJob($payload))->handle();

        return response()->json([
            'job_ran' => true,
            'job_cache_value' => Cache::get('example_job_ran'),
        ]);
    }

    public function notificationsExample(Request $request): Response
    {
        $data = $request->validate([
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $user = isset($data['user_id']) ? User::findOrFail($data['user_id']) : $this->getOrCreateDemoUser();
        $user->notify(new ExampleNotification($data['message']));

        $latest = $user->notifications()->latest()->first();

        return response()->json([
            'notified' => true,
            'notification_id' => $latest?->id,
            'notification_data' => $latest?->data,
        ]);
    }

    private function getOrCreateDemoUser(): User
    {
        return User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo User',
                // Use a deterministic demo password; for the examples we don't authenticate.
                'password' => bcrypt('demo-password'),
            ],
        );
    }
}

