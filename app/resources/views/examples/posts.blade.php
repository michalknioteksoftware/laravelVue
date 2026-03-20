<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
</head>
<body class="examples-page">
@include('partials.navbar')
<h1>Posts</h1>

<p><a href="/examples">Back to examples</a></p>

@if (!empty($singlePost ?? null))
    <h2>Single post</h2>
@endif

@if ($posts->isEmpty())
    <p>No posts yet. Create one on <a href="/examples">/examples</a>.</p>
@else
    <ul>
        @foreach ($posts as $post)
            <li class="examples-post-item">
                <h3 class="examples-post-title">{{ $post->title }}</h3>
                <div class="examples-post-meta">by user_id={{ $post->user_id }}</div>
                <p class="examples-post-body">{{ $post->body }}</p>
                <p class="examples-post-actions">
                    <a href="/examples/posts/{{ $post->id }}">view</a> |
                    <a href="/examples/authorize/posts/{{ $post->id }}">authorize update (owner)</a>
                </p>
            </li>
        @endforeach
    </ul>
@endif

</body>
</html>

