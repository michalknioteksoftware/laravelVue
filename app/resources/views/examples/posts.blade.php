<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body>
@include('partials.navbar')

<div class="container py-4">
<h1 class="h3 mb-2">Posts</h1>

<p class="mb-3"><a class="btn btn-outline-secondary btn-sm" href="/examples">Back to examples</a></p>

@if (!empty($singlePost ?? null))
    <h2 class="h5 mb-3">Single post</h2>
@endif

@if ($posts->isEmpty())
    <div class="alert alert-info" role="alert">No posts yet. Create one on <a href="/examples">/examples</a>.</div>
@else
    <ul class="list-group">
        @foreach ($posts as $post)
            <li class="list-group-item">
                <h3 class="h5 mb-1">{{ $post->title }}</h3>
                <div class="text-body-secondary small mb-1">by user_id={{ $post->user_id }}</div>
                <p class="mb-2">{{ $post->body }}</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a class="btn btn-sm btn-outline-primary" href="/examples/posts/{{ $post->id }}">view</a>
                    <a class="btn btn-sm btn-outline-success" href="/examples/authorize/posts/{{ $post->id }}">authorize update (owner)</a>
                </div>
            </li>
        @endforeach
    </ul>
@endif

</div>
</body>
</html>

