<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blade demo</title>
</head>
<body class="examples-page">
    @include('partials.navbar')
    <h1>{{ $title }}</h1>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <p><a href="/examples">Back</a></p>
</body>
</html>

