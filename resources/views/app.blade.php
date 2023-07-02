<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- ... -->
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
