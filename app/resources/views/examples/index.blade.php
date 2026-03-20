<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Examples</title>
</head>
<body class="examples-page">
@include('partials.navbar')
<h1>Laravel usage examples</h1>
<p>These endpoints demonstrate routing, controllers, validation, Eloquent, caching, filesystem, logging, middleware, events, jobs, and notifications.</p>

<h2>Pages</h2>
<ul>
    <li><a href="/examples/posts">/examples/posts</a> (Eloquent + Blade)</li>
    <li><a href="/examples/blade-demo">/examples/blade-demo</a> (Blade variables + loops)</li>
    <li><a href="/examples/cache">/examples/cache</a> (Cache facade)</li>
    <li><a href="/examples/storage">/examples/storage</a> (Storage facade)</li>
    <li><a href="/examples/logging">/examples/logging</a> (Log facade)</li>
</ul>

<h2>Actions</h2>
<h3>Create Post</h3>
<form method="POST" action="/examples/posts">
    @csrf
    <div class="examples-form-row">
        <label>User ID (optional): <input name="user_id" type="number" /></label>
    </div>
    <div class="examples-form-row">
        <label>Title: <input name="title" type="text" required maxlength="255" /></label>
    </div>
    <div class="examples-form-row">
        <label>Body: <textarea name="body" required></textarea></label>
    </div>
    <button type="submit">Create Post</button>
</form>

<h3>Validation example</h3>
<form method="POST" action="/examples/validate">
    @csrf
    <div class="examples-form-row">
        <label>Name: <input name="name" type="text" required maxlength="50" /></label>
    </div>
    <div class="examples-form-row">
        <label>Age: <input name="age" type="number" required /></label>
    </div>
    <button type="submit">Validate</button>
</form>

<h3>Authorization example</h3>
<p>Go to <a href="/examples/posts">/examples/posts</a>, create a post, then click <em>authorize update (owner)</em> next to it.</p>

<h3>Middleware example</h3>
<p>Works only with <code>?allow=1</code>.</p>
<a href="/examples/middleware?allow=1">/examples/middleware?allow=1</a>

<h3>Events + Jobs + Notifications</h3>
<ul>
    <li><a href="/examples/events">/examples/events</a> (event listener stores cache value)</li>
    <li><a href="/examples/jobs">/examples/jobs</a> (dispatchSync job stores cache value)</li>
    <li>
        <form method="POST" action="/examples/notifications" class="examples-inline-form">
            @csrf
            <input name="user_id" type="number" placeholder="user_id (optional)" />
            <input name="message" type="text" placeholder="message" required maxlength="255" />
            <button type="submit">Send notification</button>
        </form>
    </li>
</ul>
</body>
</html>

