<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Laravel')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</head>
<body class="font-sans antialiased">
    @yield('content')
</body>
</html>