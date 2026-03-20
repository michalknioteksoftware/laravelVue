<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue Examples</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/vue-examples/main.js'])
    @endif
</head>
<body>
@include('partials.navbar')

<main class="container py-4">
    <h1 class="h3 mb-2">Vue.js Examples</h1>
    <p class="text-body-secondary mb-4">
        This page is a small Vue playground showing reactivity, computed values, watchers, component props/emits, slots,
        conditional rendering, and list rendering.
    </p>

    <div id="vue-examples-root"></div>
    <noscript>This page requires JavaScript enabled.</noscript>
</main>
</body>
</html>

