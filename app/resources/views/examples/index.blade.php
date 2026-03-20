<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Examples</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body>
@include('partials.navbar')
<div class="container py-4">
<h1 class="h3 mb-2">Laravel usage examples</h1>
<p class="text-body-secondary mb-4">These endpoints demonstrate routing, controllers, validation, Eloquent, caching, filesystem, logging, middleware, events, jobs, and notifications.</p>

<h2 class="h5 mb-3">Pages</h2>
<ul class="list-group mb-4">
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/posts">/examples/posts</a> (Eloquent + Blade)</li>
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/blade-demo">/examples/blade-demo</a> (Blade variables + loops)</li>
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/cache">/examples/cache</a> (Cache facade)</li>
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/storage">/examples/storage</a> (Storage facade)</li>
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/logging">/examples/logging</a> (Log facade)</li>
</ul>

<h2 class="h5 mt-4 mb-3">Actions</h2>
<h3 class="h5 mb-3">Create Post</h3>
<form method="POST" action="/examples/posts">
    @csrf
    <div class="mb-3">
        <label>User ID (optional): <input class="form-control" name="user_id" type="number" /></label>
    </div>
    <div class="mb-3">
        <label>Title: <input class="form-control" name="title" type="text" required maxlength="255" /></label>
    </div>
    <div class="mb-3">
        <label>Body: <textarea class="form-control" name="body" required rows="4"></textarea></label>
    </div>
    <button class="btn btn-primary" type="submit">Create Post</button>
</form>

<h3 class="h5 mb-3">Validation example</h3>
<form method="POST" action="/examples/validate">
    @csrf
    <div class="mb-3">
        <label>Name: <input class="form-control" name="name" type="text" required maxlength="50" /></label>
    </div>
    <div class="mb-3">
        <label>Age: <input class="form-control" name="age" type="number" required /></label>
    </div>
    <button class="btn btn-success" type="submit">Validate</button>
</form>

<h3 class="h5 mb-3">Authorization example</h3>
<p class="mb-0">Go to <a href="/examples/posts">/examples/posts</a>, create a post, then click <em>authorize update (owner)</em> next to it.</p>

<h3 class="h5 mb-3">Middleware example</h3>
<p class="text-body-secondary mb-2">Works only with <code>?allow=1</code>.</p>
<a class="btn btn-outline-primary btn-sm" href="/examples/middleware?allow=1">/examples/middleware?allow=1</a>

<h3 class="h5 mb-3">Events + Jobs + Notifications</h3>
<ul class="list-group">
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/events">/examples/events</a> (event listener stores cache value)</li>
    <li class="list-group-item"><a class="list-group-item-action" href="/examples/jobs">/examples/jobs</a> (dispatchSync job stores cache value)</li>
    <li class="list-group-item">
        <form method="POST" action="/examples/notifications" class="d-flex flex-wrap gap-2 align-items-end">
            @csrf
            <input class="form-control w-auto" name="user_id" type="number" placeholder="user_id (optional)" />
            <input class="form-control flex-grow-1" name="message" type="text" placeholder="message" required maxlength="255" />
            <button class="btn btn-success" type="submit">Send notification</button>
        </form>
    </li>
</ul>
</div>
</body>
</html>

