<html>

<head>
    <meta charset="utf-8" />
    <title> {{ getCompany()->name ?? 'FACTURIS' }}</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="app_creator" name="Elmarzougui Abdelghafour" />
    <meta content="app_version" name="v 1.1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    @yield('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <h1>Todos</h1>
    <hr />
    {{ $slot }}
</body>

</html>
