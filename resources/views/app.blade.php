<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- ... -->
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
