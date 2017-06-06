<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   <div class="error-404 panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <h1>404</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p>Do you need a compass?</p>
                </div>
            </div>
        </div>
   </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
