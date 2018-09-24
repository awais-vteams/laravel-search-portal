<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        @include('partials.nav')

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <p>&copy;{{ date('Y') }} // <strong>Awais</strong></p>
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')
</body>
</html>
