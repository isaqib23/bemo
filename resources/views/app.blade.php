<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <script>
            window.bemo = {!! json_encode([
                'appName'   => env('APP_NAME_FORMATTED'),
                'siteUrl'   => config('app.url'),
                'apiUrl'    => config('app.url') . '/api'
            ]) !!};
        </script>
    </head>
    <body>
    <app id="app"></app>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
