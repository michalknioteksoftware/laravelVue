<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blade demo</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body>
    @include('partials.navbar')

    <div class="container py-4">
        <h1 class="h3 mb-3">{{ $title }}</h1>
        <ul class="list-group mb-4">
            @foreach ($items as $item)
                <li class="list-group-item">{{ $item }}</li>
            @endforeach
        </ul>
        <a class="btn btn-outline-secondary btn-sm" href="/examples">Back</a>
    </div>
</body>
</html>

